<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();
        $data['customers'] = $model->findAll();
        return view('customers/index', $data);
    }

    public function new()
    {
        return view('customers/create');
    }

    public function create()
    {
        $model = new CustomerModel();
        
        $model->save([
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/customers')->with('success', 'Customer added.');
    }

    public function edit($id = null)
    {
        $model = new CustomerModel();
        $data['customer'] = $model->find($id);
        return view('customers/edit', $data);
    }

    public function update($id = null)
    {
        $model = new CustomerModel();

        $model->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone')
        ]);

        return redirect()->to('/customers')->with('success', 'Customer updated.');
    }

    public function delete($id = null)
    {
        $model = new CustomerModel();
        $model->delete($id);
        return redirect()->to('/customers')->with('success', 'Customer removed.');
    }
}