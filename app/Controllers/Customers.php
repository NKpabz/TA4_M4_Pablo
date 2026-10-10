<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $customers = $customerModel->findAll();

        $data['customers'] = array_map(function ($customer) {
            return [
                'name'  => $customer['name'],
                'email' => $customer['email'],
                'phone' => $customer['phone'],
            ];
        }, $customers);

        return view('customers', $data);
    }
}