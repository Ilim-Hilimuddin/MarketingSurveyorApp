<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index(): string
    {
        return view('User/dashboard');
    }

    public function data_pengguna(): string
    {
        return view('User/data_pengguna');
    }

    public function survey(): string
    {
        return view('User/survey');
    }
}
