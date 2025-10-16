<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // List user
    public function index()
    {
        $data = [
            'users' => $this->userModel->findAll()
        ];
        return view('setting/index', $data);
    }

    // Halaman tambah user
    public function create()
    {
        return view('setting/create');
    }

    // Simpan user baru
    public function store()
    {
        $this->userModel->save([
            'username'      => $this->request->getPost('username'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'name'          => $this->request->getPost('name'),
            'role'          => $this->request->getPost('role'),
            'email'         => $this->request->getPost('email')
        ]);

        session()->setFlashdata('success', 'User berhasil ditambahkan');
        return redirect()->to('/setting');
    }

    // Halaman edit user
    public function edit($id)
    {
        $data = [
            'user' => $this->userModel->find($id)
        ];
        return view('setting/edit', $data);
    }

    // Update user
    public function update($id)
    {
        $password = $this->request->getPost('password');

        $updateData = [
            'username' => $this->request->getPost('username'),
            'name'     => $this->request->getPost('name'),
            'role'     => $this->request->getPost('role'),
            'email'    => $this->request->getPost('email')
        ];

        if (!empty($password)) {
            $updateData['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $updateData);

        session()->setFlashdata('success', 'User berhasil diperbarui');
        return redirect()->to('/setting');
    }

    // Hapus user
    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('success', 'User berhasil dihapus');
        return redirect()->to('setting/index');
    }
}
