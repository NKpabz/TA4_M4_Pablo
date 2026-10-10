<?php

namespace App\Controllers;

use App\Models\SaleModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;

class SalesController extends BaseController
{
    public function index()
    {
        $saleModel = new SaleModel();
        
        $data['sales'] = $saleModel->select('sales.*, products.name as product_name, customers.full_name as customer_name, users.full_name as staff_name')
            ->join('products', 'products.id = sales.product_id')
            ->join('customers', 'customers.id = sales.customer_id', 'left')
            ->join('users', 'users.id = sales.sold_by')
            ->findAll();

        return view('sales/index', $data);
    }

    public function create()
    {
        $productModel = new ProductModel();
        $customerModel = new CustomerModel();

        $data['products'] = $productModel->findAll();
        $data['customers'] = $customerModel->findAll();

        return view('sales/create', $data);
    }

    public function store()
    {
        $productModel = new ProductModel();
        $saleModel = new SaleModel();

        $productId = $this->request->getPost('product_id');
        $customerId = $this->request->getPost('customer_id');
        $quantity = (int)$this->request->getPost('quantity');

        $product = $productModel->find($productId);

        if (!$product || $quantity > $product['stock_quantity']) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available stock or product not found.');
        }

        $totalPrice = $product['price'] * $quantity;

        $saleModel->save([
            'product_id' => $productId,
            'customer_id' => !empty($customerId) ? $customerId : null,
            'sold_by' => session()->get('user_id'),
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $newStock = $product['stock_quantity'] - $quantity;
        $productModel->update($productId, ['stock_quantity' => $newStock]);

        return redirect()->to('/sales')->with('success', 'Sale recorded successfully!');
    }
}