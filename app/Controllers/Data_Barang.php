<?php

namespace App\Controllers;

use PhpParser\Node\Stmt\Echo_;

class Data_Barang extends BaseController
{
  public function __construct()
  {
    $this->model = new \App\Models\ModelBarang();
    $this->data = ['status' => false, 'invalidId' => '', 'invalidNama' => ''];
  }
  public function simpan(): string
  {
    $id_barang = $this->request->getPost('id_barang');
    $nama_barang = strtoupper($this->request->getPost('nama_barang'));
    $this->CekID($id_barang, $nama_barang);
    if ($this->data['status']) {
      $this->model->insert([
        'id_barang' => $id_barang,
        'nama_barang' => $nama_barang
      ]);
    }
    return json_encode($this->data);
  }

  public function edit()
  {
    $this->data = ['status' => false, 'invalidId' => '', 'invalidNama' => ''];
    $id = $this->request->getPost('id');
    $idLama = $this->request->getPost('idLama');
    $nama = strtoupper($this->request->getPost('nama'));
    $namaLama = $this->request->getPost('namaLama');
    $barang = $this->model->where('id_barang', $id)->first();
    if ($barang !== null && $barang['id_barang'] != $idLama) {
      $this->data['invalidId'] = "Id barang " . $barang['id_barang'] . " sudah ada";
    }
    $barang = $this->model->where('nama_barang', $nama)->first();
    if ($barang !== null && $barang['nama_barang'] != $namaLama) {
      $this->data['invalidNama'] = "Nama barang " . $barang['nama_barang'] . " sudah ada";
    }
    if (empty($this->data['invalidId']) && empty($this->data['invalidNama'])) {
      $this->model->where('id_barang', $idLama)->set(['id_barang' => $id, 'nama_barang' => $nama])->update();
      $this->data['status'] = true;
    }
    return json_encode($this->data);
  }

  public function cari()
  {
    $id = $this->request->getPost('id');
    $data = $this->model->where('id_barang', $id)->first();
    return json_encode($data);
  }

  public function CekID($id, $nama_barang)
  {
    if (empty($id)) {
      $this->data['invalidId'] = "Id barang tidak boleh kosong";
    } elseif ($this->model->where('id_barang', $id)->countAllResults() > 0) {
      $this->data['invalidId'] = "Id barang sudah ada";
    }
    if (empty($nama_barang)) {
      $this->data['invalidNama'] = "Nama barang tidak boleh kosong";
    } elseif ($this->model->where('nama_barang', $nama_barang)->countAllResults() > 0) {
      $this->data['invalidNama'] = "Nama barang sudah ada";
    }
    if (!empty($this->data['invalidId']) || !empty($this->data['invalidNama'])) {
      return false;
    } else {
      $this->data['status'] = true;
      return true;
    }
  }

  public function hapus()
  {
    $id = $this->request->getPost('id');
    $hapus = ($this->model->where('id_barang', $id)->delete());
    if ($hapus) return json_encode(['status' => true]);
    else return json_encode(['status' => false]);
  }
}
