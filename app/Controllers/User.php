<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        return view('User/dashboard');
    }

    public function data_barang(): string
    {
        $MBarang = new \App\Models\ModelBarang();
        $barang = $MBarang->findAll();
        return view('User/data_barang', ['barang' => $barang]);
    }

    public function data_lokasi(): string
    {
        $MLokasi = new \App\Models\ModelLokasi();
        $lokasi = $MLokasi->findAll();
        return view('User/data_lokasi', ['lokasi' => $lokasi]);
    }

    public function data_pengguna(): string
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->findAll();
        return view('User/data_pengguna', ['users' => $users]);
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
        $MTransaksi = new \App\Models\ModelTransaksi();
        $transaksi = $MTransaksi->findAll();
        return view('User/survey', ['transaksi' => $transaksi]);
    }
}
