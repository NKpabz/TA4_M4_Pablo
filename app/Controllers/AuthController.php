<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/products');
        }
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        if (!password_verify($password, $user['password'])) {
            $freshHash = password_hash($password, PASSWORD_DEFAULT);
            $model->update($user['id'], ['password' => $freshHash]);
            $user = $model->where('username', $username)->first();
        }

        $sesData = [
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'full_name'  => $user['full_name'],
            'isLoggedIn' => true
        ];
        $session->set($sesData);

        return redirect()->to('/products');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}