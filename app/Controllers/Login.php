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

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $valid = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => '{field} tidak valid'
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
                'inputEmail' => $email,
                'errEmail' => $validation->getError('email'),
                'errPass' => $validation->getError('password')
            ];
            session()->setFlashdata($sesErr);
            return redirect()->to('/');
        } else {
            $userModel = new \App\Models\UserModel();
            $user = $userModel->where('email', $email)->first();
            // dd($user['password'] . ' - ' . password_hash($password, PASSWORD_BCRYPT) . ' - ' . $password);
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'user' => $user,
                        'logged_in' => TRUE
                    ];
                    session()->set($data);
                    return redirect()->to('/user');
                } else {
                    $sessErr['errPass'] = 'Password salah';
                    $sessErr['inputEmail'] = $email;
                    session()->setFlashdata($sessErr);
                    return redirect()->to('/');
                }
            } else {
                $sessErr['errEmail'] = 'Email tidak terdaftar';
                $sessErr['inputEmail'] = $email;
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
