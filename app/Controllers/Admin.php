<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function dashboard(): string
    {
        return view('Admin/dashboard');
    }
}
