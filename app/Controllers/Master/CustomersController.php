<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class CustomersController extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    // List semua customer
    public function index()
    {
        $data = [
            'customers' => $this->customerModel->findAll()
        ];
        return view('master/customer/index', $data);
    }

    // Halaman tambah customer
    public function create()
    {
        return view('master/customer/create');
    }

    // Simpan customer baru
    public function store()
    {
        $this->customerModel->save([
            'name'    => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'address' => $this->request->getPost('address'),
            'phone'   => $this->request->getPost('phone'),
            'email'   => $this->request->getPost('email'),
        ]);

        session()->setFlashdata('success', 'Customer berhasil ditambahkan');
        return redirect()->to('/customers');
    }

    // Halaman edit customer
    public function edit($id)
    {
        $data = [
            'customer' => $this->customerModel->find($id)
        ];
        return view('master/customer/edit', $data);
    }

    // Update customer
    public function update($id)
    {
        $this->customerModel->update($id, [
            'name'    => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'address' => $this->request->getPost('address'),
            'phone'   => $this->request->getPost('phone'),
            'email'   => $this->request->getPost('email'),
        ]);

        session()->setFlashdata('success', 'Customer berhasil diperbarui');
        return redirect()->to('/customers');
    }

    // Hapus customer
    public function delete($id)
    {
        $this->customerModel->delete($id);
        session()->setFlashdata('success', 'Customer berhasil dihapus');
        return redirect()->to('/customers');
    }
}
