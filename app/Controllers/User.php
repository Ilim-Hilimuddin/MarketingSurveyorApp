<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return view('User/dashboard');
        } else {
            return redirect()->to('/');
        }
    }
}
