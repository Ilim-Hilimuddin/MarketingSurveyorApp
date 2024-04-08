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
        return view('User/dashboard');
    }
    public function survey(): string
    {
        return view('User/survey');
    }
}
