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

    public function data_barang(): string
    {
        return view('User/data_barang');
    }

    public function data_lokasi(): string
    {
        return view('User/data_lokasi');
    }

    public function survey(): string
    {
        return view('User/survey');
    }
}
