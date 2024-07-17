<?php

namespace App\Controllers;

class Profile  extends BaseController
{
  public function index()
  {
    $userModel = new \App\Models\UserModel();
    $data['user'] = $userModel->where('id_user', session()->get('user')['id_user'])->first();
    return view('user/profile', $data);
  }

  public function update_profile()
  {
    $userModel = new \App\Models\UserModel();
    $userId = session()->get('user_id');

    $data = [
      'nama' => $this->request->getPost('nama'),
      'email' => $this->request->getPost('email')
    ];

    if ($password = $this->request->getPost('password')) {
      $data['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    if ($file = $this->request->getFile('image')) {
      if ($file->isValid() && !$file->hasMoved()) {
        $fileName = $file->getRandomName();
        $file->move('uploads/profile_pictures/', $fileName);
        $data['image'] = $fileName;
      }
    }

    $userModel->update($userId, $data);

    return $this->response->setJSON(['success' => true, 'image' => $data['image'] ?? null]);
  }
}
