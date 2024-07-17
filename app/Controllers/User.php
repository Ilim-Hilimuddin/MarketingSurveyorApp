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
                'donutChartData' => $this->model->getSurveyData(),
                'columnChartData' => $this->model->getSurveyDataLast6Months(),
                'topLocation' => $this->model->getTopLocation(),
                'topSales' => $this->model->getTopSales(),
                'topProduct' => $this->model->getTopProduct(),
                'downProduct' => $this->model->getDownProduct()
            ];
            // dd($data);
            return view('User/dashboard', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
