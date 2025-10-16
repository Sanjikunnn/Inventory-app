<?php

namespace App\Controllers\Transactions;

use App\Controllers\BaseController;
use App\Models\PurchaseOrderModel;
use App\Models\PurchaseOrderItemModel;
use App\Models\SupplierModel;
use App\Models\ItemModel;
use App\Models\WarehouseModel;

class PurchaseOrdersController extends BaseController
{
    protected $poModel;
    protected $poItemModel;
    protected $supplierModel;
    protected $itemModel;
    protected $warehouseModel;

    public function __construct()
    {
        $this->poModel = new PurchaseOrderModel();
        $this->poItemModel = new PurchaseOrderItemModel();
        $this->supplierModel = new SupplierModel();
        $this->itemModel = new ItemModel();
        $this->warehouseModel = new WarehouseModel();
    }

    // List PO
    public function index()
    {
        $data = [
            'purchaseOrders' => $this->poModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('transactions/po/index', $data);
    }

    // Halaman tambah PO
    public function create()
    {
        $data = [
            'suppliers' => $this->supplierModel->findAll(),
            'items' => $this->itemModel->findAll(),
            'warehouses' => $this->warehouseModel->findAll(),
        ];
        return view('transactions/po/create', $data);
    }

    // Simpan PO baru
    public function store()
    {
        $poNumber = 'PO-' . date('YmdHis'); // generate po_number
        $supplierId = $this->request->getPost('supplier_id');
        $userId = session()->get('user_id');
        $items = $this->request->getPost('items'); // array: item_id, warehouse_id, qty, price

        $total = 0;
        foreach ($items as $item) {
            $total += $item['qty'] * $item['price'];
        }

        $poId = $this->poModel->insert([
            'po_number' => $poNumber,
            'supplier_id' => $supplierId,
            'user_id' => $userId,
            'total_amount' => $total,
            'status' => 'Pending',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Simpan item
        foreach ($items as $item) {
            $this->poItemModel->insert([
                'po_id' => $poId,
                'item_id' => $item['item_id'],
                'warehouse_id' => $item['warehouse_id'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'subtotal' => $item['qty'] * $item['price']
            ]);
        }

        session()->setFlashdata('success', 'PO berhasil dibuat');
        return redirect()->to('/po');
    }

    // Approve PO
    public function approve($id)
    {
        $this->poModel->update($id, ['status' => 'Approved']);
        session()->setFlashdata('success', 'PO berhasil disetujui');
        return redirect()->back();
    }

    // Reject PO
    public function reject($id)
    {
        $this->poModel->update($id, ['status' => 'Rejected']);
        session()->setFlashdata('success', 'PO berhasil ditolak');
        return redirect()->back();
    }
}
