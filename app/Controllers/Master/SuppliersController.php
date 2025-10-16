<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class SuppliersController extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    // List supplier
    public function index()
    {
        $data = [
            'suppliers' => $this->supplierModel->findAll()
        ];
        return view('master/supplier/index', $data);
    }

    // Halaman tambah supplier
    public function create()
    {
        return view('master/supplier/create');
    }

    // Simpan supplier baru
    public function store()
    {
        $this->supplierModel->save([
            'name'    => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'address' => $this->request->getPost('address'),
            'phone'   => $this->request->getPost('phone'),
            'email'   => $this->request->getPost('email'),
        ]);

        session()->setFlashdata('success', 'Supplier berhasil ditambahkan');
        return redirect()->to('/suppliers');
    }

    // Halaman edit supplier
    public function edit($id)
    {
        $data = [
            'supplier' => $this->supplierModel->find($id)
        ];
        return view('master/supplier/edit', $data);
    }

    // Update supplier
    public function update($id)
    {
        $this->supplierModel->update($id, [
            'name'    => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'address' => $this->request->getPost('address'),
            'phone'   => $this->request->getPost('phone'),
            'email'   => $this->request->getPost('email'),
        ]);

        session()->setFlashdata('success', 'Supplier berhasil diperbarui');
        return redirect()->to('/suppliers');
    }

    // Hapus supplier
    public function delete($id)
    {
        $this->supplierModel->delete($id);
        session()->setFlashdata('success', 'Supplier berhasil dihapus');
        return redirect()->to('/suppliers');
    }
}
