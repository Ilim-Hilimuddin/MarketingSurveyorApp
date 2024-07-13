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

  public function simpan()
  {
    $validation = $this->validasiSimpan($this->request->getPost());

    if ($validation['status'] === false) return json_encode($validation);

    // Cek apakah id user dan email terdaftar
    $userModel = $this->model;
    $user = $userModel->where('id_user', $this->request->getPost('id'))->first();
    $email = $userModel->where('email', $this->request->getPost('email'))->first();
    if ($user) {
      $data['status'] = false;
      $data['id'] = 'ID user sudah terdaftar';
    }
    if ($email) {
      $data['status'] = false;
      $data['email'] = 'Email sudah terdaftar';
    }

    if ($user || $email) {
      return json_encode($data);
    }

    $fileName = 'default.jpg';

    if ($this->request->getFile('foto')) {
      $file = $this->request->getFile('foto');
      if ($file->getError() == UPLOAD_ERR_OK) {
        $fileName = $file->getRandomName();
        $file->move('assets/img/', $fileName);
      }
    }

    $data = [
      'id_user' => $this->request->getPost('id'),
      'id_role' => $this->request->getPost('role'),
      'nama_lengkap' => strtoupper($this->request->getPost('nama')),
      'jenis_kelamin' => $this->request->getPost('gender'),
      'tgl_lahir' => $this->request->getPost('tglLahir'),
      'alamat' => $this->request->getPost('alamat'),
      'telepon' => $this->request->getPost('telepon'),
      'email' => $this->request->getPost('email'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
      'foto' => $fileName
    ];

    $this->model->insert($data);
    $data['status'] = true;
    return json_encode($data);
  }

  public function edit()
  {
    // Validasi data yang diterima dari form
    $validation = $this->validasiEdit($this->request->getPost());
    if ($validation['status'] === false) {
      return json_encode($validation);
    }

    // Ambil data dari form
    $newUserId = $this->request->getPost('idEdit');
    $currentUserId = $this->request->getPost('currentId');
    $newEmail = $this->request->getPost('emailEdit');
    $password = $this->request->getPost('passwordEdit');
    $repeatPassword = $this->request->getPost('repeatPasswordEdit');
    $file = $this->request->getFile('fotoEdit');

    $userModel = $this->model;

    // Ambil pengguna berdasarkan id lama
    $user = $userModel->where('id_user', $currentUserId)->first();

    if (!$user) {
      return json_encode([
        'status' => false,
        'idEdit' => 'Pengguna tidak ditemukan'
      ]);
    }

    $currentEmail = $user['email'];
    $currentPhoto = $user['foto'];

    // Cek apakah id baru sudah terdaftar (kecuali pengguna saat ini)
    if ($currentUserId !== $newUserId && $userModel->where('id_user', $newUserId)->first()) {
      return json_encode([
        'status' => false,
        'idEdit' => 'ID user sudah terdaftar'
      ]);
    }

    // Cek apakah email baru sudah terdaftar (kecuali pengguna saat ini)
    if ($currentEmail !== $newEmail && $userModel->where('email', $newEmail)->first()) {
      return json_encode([
        'status' => false,
        'emailEdit' => 'Email sudah terdaftar'
      ]);
    }

    // Cek apakah password dan repeat password cocok serta memiliki panjang minimal 5 karakter
    if ($password || $repeatPassword) {
      if (!$password || !$repeatPassword) {
        return json_encode([
          'status' => false,
          'passwordEdit' => !$password ? 'Password tidak boleh kosong' : null,
          'repeatPasswordEdit' => !$repeatPassword ? 'Repeat Password tidak boleh kosong' : null
        ]);
      }

      if (strlen($password) < 5 || strlen($repeatPassword) < 5) {
        return json_encode([
          'status' => false,
          'passwordEdit' => strlen($password) < 5 ? 'Password harus memiliki minimal 5 karakter' : null,
          'repeatPasswordEdit' => strlen($repeatPassword) < 5 ? 'Repeat Password harus memiliki minimal 5 karakter' : null
        ]);
      }

      if ($password !== $repeatPassword) {
        return json_encode([
          'status' => false,
          'passwordEdit' => 'Password tidak cocok'
        ]);
      }
    }

    // Siapkan data untuk pembaruan
    $dataUpdate = [
      'id_user' => $newUserId,
      'id_role' => $this->request->getPost('roleEdit'),
      'nama_lengkap' => strtoupper($this->request->getPost('namaEdit')),
      'jenis_kelamin' => $this->request->getPost('genderEdit'),
      'tgl_lahir' => $this->request->getPost('tglLahirEdit'),
      'alamat' => $this->request->getPost('alamatEdit'),
      'telepon' => $this->request->getPost('teleponEdit'),
      'email' => $newEmail
    ];

    // Tambahkan password jika ada
    if ($password) {
      $dataUpdate['password'] = password_hash($password, PASSWORD_BCRYPT);
    }

    // Cek apakah file foto ada dan valid
    if ($file->isValid() && !$file->hasMoved()) {
      $fileName = $file->getRandomName();
      $file->move('assets/img/', $fileName);
      $dataUpdate['foto'] = $fileName;

      // Hapus file lama jika bukan default
      if ($currentPhoto != 'default.jpg') {
        unlink('assets/img/' . $currentPhoto);
      }
    }

    // Update data pengguna
    $userModel->where('id_user', $currentUserId)->set($dataUpdate)->update();

    return json_encode(['status' => true]);
  }

  public function hapus()
  {
    $id = $this->request->getPost('id');
    $userModel = $this->model;
    $user = $userModel->where('id_user', $id)->first();
    if (!$user) {
      $data['status'] = false;
      $data['error'] = 'ID user tidak ditemukan';
      return json_encode($data);
    }
    $this->model->where('id_user', $id)->delete();
    $data['status'] = true;
    return json_encode($data);
  }

  function validasiSimpan($data)
  {
    $rules = [
      'id' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ID user harus diisi',
        ],
      ],
      'role' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Role harus diisi',
        ],
      ],
      'nama' => [
        'rules' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
        'errors' => [
          'required' => 'Nama harus diisi',
          'regex_match' => 'Karakter nama harus huruf dan spasi',
        ],
      ],
      'gender' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis kelamin harus diisi',
        ],
      ],
      'tglLahir' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tgl Lahir harus diisi',
        ],
      ],
      'alamat' => [
        'rules' => 'required|max_length[150]',
        'errors' => [
          'required' => 'Alamat harus diisi',
          'max_length' => 'Alamat maksimal 150 karakter',
        ],
      ],
      'telepon' => [
        'rules' => 'required|max_length[15]',
        'errors' => [
          'required' => 'Nomor Telepon harus diisi',
          'max_length' => 'Nomor Telepon maksimal 15 karakter',
        ],
      ],
      'email' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'Email harus diisi',
          'valid_email' => 'Email tidak valid',
        ],
      ],
      'password' => [
        'rules' => 'required|matches[repeatpassword]|min_length[5]|max_length[255]',
        'errors' => [
          'required' => 'Password harus diisi',
          'matches' => 'Password tidak sama',
          'min_length' => 'Password minimal 5 karakter',
        ],
      ],
      'repeatpassword' => [
        'rules' => 'required|min_length[5]|max_length[255]',
        'errors' => [
          'required' => 'Ulangi Password harus diisi',
          'min_length' => 'Ulangi Password minimal 5 karakter',
        ],
      ],
      'foto' => [
        'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1024]',
        'errors' => [
          'mime_in' => 'File harus berupa jpg, jpeg, gif, atau png',
          'max_size' => 'File maksimal 1 MB',
        ],
      ],
    ];

    $validation = \Config\Services::validation();
    $validation->setRules($rules);

    if (!$validation->run($data)) {
      $errors = $validation->getErrors();
      $errors['status'] = false;
      return $errors;
    }

    return ['status' => true];
  }

  function validasiEdit($data)
  {
    $rules = [
      'idEdit' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ID user harus diisi',
        ],
      ],
      'roleEdit' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Role harus diisi',
        ],
      ],
      'namaEdit' => [
        'rules' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
        'errors' => [
          'required' => 'Nama harus diisi',
          'regex_match' => 'Karakter nama harus huruf dan spasi',
        ],
      ],
      'genderEdit' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis kelamin harus diisi',
        ],
      ],
      'tglLahirEdit' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tgl Lahir harus diisi',
        ],
      ],
      'alamatEdit' => [
        'rules' => 'required|max_length[150]',
        'errors' => [
          'required' => 'Alamat harus diisi',
          'max_length' => 'Alamat maksimal 150 karakter',
        ],
      ],
      'teleponEdit' => [
        'rules' => 'required|max_length[15]',
        'errors' => [
          'required' => 'Nomor Telepon harus diisi',
          'max_length' => 'Nomor Telepon maksimal 15 karakter',
        ],
      ],
      'emailEdit' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'Email harus diisi',
          'valid_email' => 'Email tidak valid',
        ],
      ],
      'fotoEdit' => [
        'rules' => 'mime_in[fotoEdit,image/jpg,image/jpeg,image/gif,image/png]|max_size[fotoEdit,1024]',
        'errors' => [
          'mime_in' => 'File harus berupa jpg, jpeg, gif, atau png',
          'max_size' => 'File maksimal 1 MB',
        ],
      ],
    ];

    $validation = \Config\Services::validation();
    $validation->setRules($rules);

    if (!$validation->run($data)) {
      $errors = $validation->getErrors();
      $errors['status'] = false;
      return $errors;
    }

    return ['status' => true];
  }

  public function cari()
  {
    $id = $this->request->getPost('id');
    $data['user'] = $this->model->where('id_user', $id)->first();
    return json_encode($data);
  }

  public function detail()
  {
    $id = $this->request->getVar('id');
    $data['user'] = $this->model->where('id_user', $id)->first();
    return view('User/detail_pengguna', $data);
  }
}
