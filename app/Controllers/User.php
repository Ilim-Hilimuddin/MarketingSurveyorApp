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

    public function data_barang(): string
    {
        $MBarang = new \App\Models\ModelBarang();
        $katakunci = $this->request->getVar('katakunci');
        $pencarian = $katakunci ? $MBarang->cari($katakunci) : $MBarang;
        $barang = $pencarian->orderBy('id_barang', 'ASC')->paginate(env('PER_PAGE'));
        $pager = $pencarian->pager;
        $nomor = ($this->request->getVar('page') ?? 1) == 1 ? 1 : (($this->request->getVar('page') - 1) * env('PER_PAGE') + 1);
        return view('User/data_barang', ['barang' => $barang, 'pager' => $pager, 'nomor' => $nomor, 'katakunci' => $katakunci]);
    }

    public function data_lokasi(): string
    {
        $MLokasi = new \App\Models\ModelLokasi();
        $katakunci = $this->request->getVar('katakunci');
        $pencarian = $katakunci ? $MLokasi->cari($katakunci) : $MLokasi;
        $lokasi = $pencarian->orderBy('id_lokasi', 'ASC')->paginate(env('PER_PAGE'));
        $pager = $pencarian->pager;
        $nomor = ($this->request->getVar('page') ?? 1) == 1 ? 1 : (($this->request->getVar('page') - 1) * env('PER_PAGE') + 1);
        return view('User/data_lokasi', ['lokasi' => $lokasi, 'pager' => $pager, 'nomor' => $nomor, 'katakunci' => $katakunci]);
    }

    public function data_pengguna(): string
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->findAll();
        return view('User/data_pengguna', ['users' => $users]);
    }
}
