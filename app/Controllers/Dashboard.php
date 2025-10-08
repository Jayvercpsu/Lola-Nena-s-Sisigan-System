<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;

class Dashboard extends BaseController
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

        $productModel = new ProductModel();
        $userModel = new UserModel();

        $data['totalProducts'] = $productModel->countAll();
        $data['totalUsers'] = $userModel->countAll();
        $data['recentProducts'] = $productModel->orderBy('created_at', 'DESC')->findAll(5);

        return view('dashboard/index', $data);
    }
}