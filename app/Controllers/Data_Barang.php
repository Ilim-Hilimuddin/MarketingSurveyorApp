<?php

namespace App\Controllers;

use PhpParser\Node\Stmt\Echo_;

class Data_Barang extends BaseController
{
  public function __construct()
  {
    $this->model = new \App\Models\ModelBarang();
    $this->data = ['status' => false, 'message' => ''];
  }
  public function simpan(): string
  {
    $id_barang = $this->request->getPost('id_barang');
    $nama_barang = $this->request->getPost('nama_barang');
    $this->CekID($id_barang, $nama_barang);
    if ($this->data['status']) {
      $this->model->insert([
        'id_barang' => $id_barang,
        'nama_barang' => $nama_barang
      ]);
    }
    return json_encode($this->data);
  }

  public function CekID($id, $nama_barang)
  {
    if (empty($id)) {
      $this->data['message'] = "Id barang tidak boleh kosong";
    } else if ($this->model->where('id_barang', $id)->countAllResults() > 0) {
      $this->data['message'] = "Id barang sudah ada";
    } else if (empty($nama_barang)) {
      $this->data['message'] = "Nama barang tidak boleh kosong";
    } else if ($this->model->where('nama_barang', $nama_barang)->countAllResults() > 0) {
      $this->data['message'] = "Nama barang sudah ada";
    }
    if (!empty($this->data['message'])) {
      return false;
    } else {
      $this->data['status'] = true;
      $this->data['message'] = "Data tersimpan";
      return true;
    }
  }
}
