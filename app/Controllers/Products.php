<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
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
        $data['products'] = $productModel->findAll();
        return view('products/index', $data);
    }

    public function create()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        return view('products/create');
    }

    public function store()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $productModel = new ProductModel();
        
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock')
        ];

        if ($productModel->insert($data)) {
            session()->setFlashdata('success', 'Product created successfully');
        } else {
            session()->setFlashdata('error', 'Failed to create product');
        }

        return redirect()->to('/products');
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $productModel = new ProductModel();
        $data['product'] = $productModel->find($id);
        
        if (!$data['product']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found');
        }

        return view('products/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $productModel = new ProductModel();
        
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock')
        ];

        if ($productModel->update($id, $data)) {
            session()->setFlashdata('success', 'Product updated successfully');
        } else {
            session()->setFlashdata('error', 'Failed to update product');
        }

        return redirect()->to('/products');
    }

    public function delete($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $productModel = new ProductModel();
        
        if ($productModel->delete($id)) {
            session()->setFlashdata('success', 'Product deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete product');
        }

        return redirect()->to('/products');
    }
}