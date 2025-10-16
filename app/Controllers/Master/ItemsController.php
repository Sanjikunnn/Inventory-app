<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\ItemModel;

class ItemsController extends BaseController
{
    protected $itemModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }

    // Tampilkan semua item
    public function index()
    {
        $data = [
            'items' => $this->itemModel->findAll()
        ];

        return view('master/item/index', $data);
    }

    // Halaman form tambah item
    public function create()
    {
        return view('master/item/create');
    }

    // Halaman form edit item
    public function edit($id)
    {
        $data = [
            'item' => $this->itemModel->find($id)
        ];

        return view('master/item/edit', $data);
    }

    // Simpan item baru
    public function store()
    {
        $this->itemModel->save([
            'sku'         => $this->request->getPost('sku'),
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'unit'        => $this->request->getPost('unit'),
            'price'       => $this->request->getPost('price'),
            'min_stock'   => $this->request->getPost('min_stock')
        ]);

        session()->setFlashdata('success', 'Item berhasil ditambahkan');
        return redirect()->to('/items');
    }

    // Update item
    public function update($id)
    {
        $this->itemModel->update($id, [
            'sku'         => $this->request->getPost('sku'),
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'unit'        => $this->request->getPost('unit'),
            'price'       => $this->request->getPost('price'),
            'min_stock'   => $this->request->getPost('min_stock')
        ]);

        session()->setFlashdata('success', 'Item berhasil diperbarui');
        return redirect()->to('/items');
    }

    // Hapus item
    public function delete($id)
    {
        $this->itemModel->delete($id);
        session()->setFlashdata('success', 'Item berhasil dihapus');
        return redirect()->to('/items');
    }
}
