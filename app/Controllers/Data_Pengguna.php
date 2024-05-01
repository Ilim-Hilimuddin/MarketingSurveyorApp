<?php

namespace App\Controllers;

use App\Models\UserModel;

class Data_Pengguna extends BaseController
{
  public function __construct()
  {
    $this->model = new UserModel();
  }

  public function index()
  {
    $userModel = $this->model;
    $users = $userModel->findAll();
    return view('User/data_pengguna', ['users' => $users]);
  }
}
