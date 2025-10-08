<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        log_message('debug', 'Login attempt - Username: ' . $username);
        
        $user = $userModel->where('username', $username)->first();
        
        if (!$user) {
            log_message('debug', 'User not found: ' . $username);
            $session->setFlashdata('error', 'User not found');
            return redirect()->to('/');
        }
        
        log_message('debug', 'User found. Checking password...');
        log_message('debug', 'Password from form: ' . $password);
        log_message('debug', 'Hash from database: ' . $user['password']);
        
        $verified = password_verify($password, $user['password']);
        log_message('debug', 'Password verify result: ' . ($verified ? 'true' : 'false'));
        
        if ($verified) {
            $sessionData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'full_name' => $user['full_name'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ];
            $session->set($sessionData);
            log_message('debug', 'Login successful');
            return redirect()->to('/dashboard');
        } else {
            log_message('debug', 'Password verification failed');
            $session->setFlashdata('error', 'Invalid password');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}