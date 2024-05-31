<?php

namespace App\Controllers;

use App\Models\AuthModel;

class UserData extends BaseController
{
    protected $AuthModel;

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }
    public function index()
    {
        $user = $this->AuthModel->where('level', 'user')->findAll();
        $data = [
            'title' => 'Data User',
            'menu' => 'data_user',
            'user' => $user
        ];
        return view('admin/admin-user-data', $data);
    }
    public function edit_user($id = false)
    {
        $user = $this->AuthModel->where('id_user', $id)->first();
        $data = [
            'title' => 'edit User',
            'menu' => 'data_user',
            'user' => $user
        ];
        return view('admin/edit_user', $data);
    }
    public function save_edit_user()
    {
        $request = service('request');

        $id_user = $request->getPost('id_user');
        $nama = $request->getPost('nama_lengkap');
        $username = $request->getPost('username');
        $email = $request->getPost('email');

        $data = [
            'nama_lengkap' => $nama,
            'username' => $username,
            'email' => $email,
        ];
        // dd($data);
        $this->AuthModel->update($id_user, $data);

        session()->setFlashdata('pesan', 'Data user berhasil diupdate');
        return redirect()->to('/data_user');
    }
    public function delete_user($id = false)
    {
        $this->AuthModel->delete($id);
        session()->setFlashdata('pesan', 'Data user berhasil dihapus');
        return redirect()->to('/data_user');
    }
}
