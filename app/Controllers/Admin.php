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
    public function admin(): string
    {
        return view('Admin/admin');
    }
    public function marketing(): string
    {
        return view('Admin/marketing');
    }
}
