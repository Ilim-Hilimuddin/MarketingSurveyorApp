<?php

namespace App\Controllers;

class User extends BaseController
{

    public function __construct()
    {
        $this->model = new \App\Models\ModelTransaksi();
    }
    public function index()
    {
        if (session()->get('logged_in')) {
            $data = [
                'transaksi' => $this->model->getSurveyData()
            ];
            // dd($data);
            return view('User/dashboard', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
