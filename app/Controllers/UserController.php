<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function new()
    {
        return view('users/create');
    }

    public function create()
    {
        $model = new UserModel();
        
        $avatar = $this->request->getFile('avatar');
        $avatarName = null;

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            $avatarName = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/uploads', $avatarName);
        }

        $model->save([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'avatar' => $avatarName,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users')->with('success', 'Staff member added successfully.');
    }

    public function edit($id = null)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id = null)
    {
        $model = new UserModel();
        
        $avatar = $this->request->getFile('avatar');
        $avatarName = $this->request->getPost('old_avatar');

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            $avatarName = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/uploads', $avatarName);
        }

        $updateData = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'avatar' => $avatarName
        ];

        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            $updateData['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $model->update($id, $updateData);

        return redirect()->to('/users')->with('success', 'Staff member updated successfully.');
    }

    public function delete($id = null)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'Staff member deleted.');
    }
}