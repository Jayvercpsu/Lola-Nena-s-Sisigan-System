<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('users/index', $data);
    }

    public function create()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        return view('users/create');
    }

    public function store()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $userModel = new UserModel();
        
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'full_name' => $this->request->getPost('full_name'),
            'role' => $this->request->getPost('role')
        ];

        if ($userModel->insert($data)) {
            session()->setFlashdata('success', 'User created successfully');
        } else {
            session()->setFlashdata('error', 'Failed to create user');
        }

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        
        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        return view('users/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $userModel = new UserModel();
        
        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'role' => $this->request->getPost('role')
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = $password;
        }

        if ($userModel->update($id, $data)) {
            session()->setFlashdata('success', 'User updated successfully');
        } else {
            session()->setFlashdata('error', 'Failed to update user');
        }

        return redirect()->to('/users');
    }

    public function delete($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $userModel = new UserModel();
        
        if ($userModel->delete($id)) {
            session()->setFlashdata('success', 'User deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete user');
        }

        return redirect()->to('/users');
    }
}