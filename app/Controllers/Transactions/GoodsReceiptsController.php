<?php

namespace App\Controllers\Transactions;

use App\Controllers\BaseController;
use App\Models\GoodsReceiptModel;
use App\Models\GoodsReceiptItemModel;
use App\Models\PurchaseOrderModel;
use App\Models\PurchaseOrderItemModel;
use App\Models\ItemStockModel;

class GoodsReceiptsController extends BaseController
{
    protected $grnModel;
    protected $grnItemModel;
    protected $poModel;
    protected $poItemModel;
    protected $stockModel;

    public function __construct()
    {
        $this->grnModel = new GoodsReceiptModel();
        $this->grnItemModel = new GoodsReceiptItemModel();
        $this->poModel = new PurchaseOrderModel();
        $this->poItemModel = new PurchaseOrderItemModel();
        $this->stockModel = new ItemStockModel();
    }

    public function poList()
    {
        // Ambil semua PO yang Approved
        $allApprovedPOs = $this->poModel->where('status', 'Approved')->orderBy('created_at', 'DESC')->findAll();

        // Filter PO yang belum punya GRN
        $purchaseOrders = [];
        foreach($allApprovedPOs as $po) {
            $grnExists = $this->grnModel->where('po_id', $po['id'])->first();
            if(!$grnExists) {
                $purchaseOrders[] = $po;
            }
        }

        return view('transactions/grn/po_list', ['purchaseOrders' => $purchaseOrders]);
    }

    
    public function index()
    {
        $grns = $this->grnModel->orderBy('created_at','DESC')->findAll();

        // Ambil semua user untuk mapping id => name
        $users = model('App\Models\UserModel')->findAll();
        $userMap = [];
        foreach($users as $user){
            $userMap[$user['id']] = $user['name']; // asumsinya kolom nama 'name'
        }

        return view('transactions/grn/index', [
            'grns' => $grns,
            'userMap' => $userMap
        ]);
    }


    public function create($poId)
    {
        $po = $this->poModel->find($poId);
        if(!$po || $po['status'] != 'Approved'){
            session()->setFlashdata('error','PO belum disetujui');
            return redirect()->back();
        }

        $items = $this->poItemModel->where('po_id',$poId)->findAll();
        return view('transactions/grn/create', ['po'=>$po,'items'=>$items]);
    }

    public function store()
    {
        $poId = $this->request->getPost('po_id');
        $items = $this->request->getPost('items'); // array item_id, warehouse_id, qty

        $grnNumber = 'GRN-' . date('YmdHis');

        $grnId = $this->grnModel->insert([
            'grn_number' => $grnNumber,
            'po_id'      => $poId,
            'status'     => 'Pending',
            'approved_by'=> null,
            'created_at' => date('Y-m-d H:i:s')
        ]);


        foreach($items as $item){
            $this->grnItemModel->insert([
                'grn_id'       => $grnId,
                'item_id'      => $item['item_id'],
                'warehouse_id' => $item['warehouse_id'],
                'qty'          => $item['qty']
            ]);
        }

        session()->setFlashdata('success','GRN berhasil dibuat');
        return redirect()->to('/grn');
    }

    public function approve($id)
    {
        $grn = $this->grnModel->find($id);
        if(!$grn) {
            session()->setFlashdata('error','GRN tidak ditemukan');
            return redirect()->back();
        }

        // Ambil semua item GRN
        $grnItems = $this->grnItemModel->where('grn_id',$id)->findAll();

        foreach($grnItems as $item){
            $existing = $this->stockModel->where([
                'item_id'=>$item['item_id'],
                'warehouse_id'=>$item['warehouse_id']
            ])->first();

            if($existing){
                // tambah stok
                $this->stockModel->update($existing['id'], [
                    'qty' => $existing['qty'] + $item['qty']
                ]);
            }else{
                // buat baru kalau belum ada
                $this->stockModel->insert([
                    'item_id'=>$item['item_id'],
                    'warehouse_id'=>$item['warehouse_id'],
                    'qty'=>$item['qty']
                ]);
            }
        }

        // Update status GRN jadi Approved
        $this->grnModel->update($id, [
            'status' => 'Approved',
            'approved_by' => session()->get('user_id'),
            'created_at' => date('Y-m-d H:i:s') // karena ga pakai updated_at
        ]);

        session()->setFlashdata('success','GRN disetujui dan stok diperbarui');
        return redirect()->back();
    }

    public function reject($id)
    {
        $grn = $this->grnModel->find($id);
        if(!$grn) {
            session()->setFlashdata('error','GRN tidak ditemukan');
            return redirect()->back();
        }

        // Update status GRN jadi Rejected, PO tetap bisa digunakan lagi
        $this->grnModel->update($id, [
            'status'=>'Rejected',
            'approved_by'=>session()->get('user_id'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        session()->setFlashdata('success','GRN ditolak, PO tetap bisa diambil ulang');
        return redirect()->back();
    }

}
