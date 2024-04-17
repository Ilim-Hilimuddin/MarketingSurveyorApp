<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/user');
        }
        $validation = \Config\Services::validation();
        return view('Login/login', ['validation' => $validation]);
    }
    public function login()
    {
        $validation = \Config\Services::validation();

        $user = $this->request->getVar('user');
        $password = $this->request->getVar('password');

        $valid = $this->validate([
            'user' => [
                'label' => 'Email atau ID User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 karakter'
                ]
            ]
        ]);

        if (!$valid) {
            $sesErr = [
                'inputUser' => $user,
                'errUser' => $validation->getError('user'),
                'errPass' => $validation->getError('password')
            ];
            session()->setFlashdata($sesErr);
            return redirect()->to('/');
        } else {
            $userModel = new \App\Models\UserModel();
            $getUser = $userModel->where('email', $user)->orWhere('id_user', $user)->first();
            // dd($getUser);
            if ($getUser) {
                if (password_verify($password, $getUser['password'])) {
                    $data = [
                        'user' => $getUser,
                        'logged_in' => TRUE
                    ];
                    session()->set($data);
                    return redirect()->to('/user');
                } else {
                    $sessErr['errPass'] = 'Password salah';
                    $sessErr['inputUser'] = $user;
                    session()->setFlashdata($sessErr);
                    return redirect()->to('/');
                }
            } else {
                $sessErr['errUser'] = 'Akun tidak terdaftar';
                $sessErr['inputUser'] = $user;
                session()->setFlashdata($sessErr);
                return redirect()->to('/');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
