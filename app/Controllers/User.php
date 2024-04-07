<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function dashboard(): string
    {
        return view('user/dashboard');
    }
}
