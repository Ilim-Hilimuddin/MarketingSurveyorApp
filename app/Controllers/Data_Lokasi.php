<?php

namespace App\Controllers;

use PhpParser\Node\Stmt\Echo_;

class Data_Lokasi extends BaseController
{
  public function __construct()
  {
    $this->model = new \App\Models\ModelLokasi();
    $this->data = ['status' => false, 'invalidId' => '', 'invalidNama' => ''];
  }
  public function simpan(): string
  {
    $id_lokasi = $this->request->getPost('id_lokasi');
    $nama_lokasi = strtoupper($this->request->getPost('nama_lokasi'));
    $this->CekID($id_lokasi, $nama_lokasi);
    if ($this->data['status']) {
      $this->model->insert([
        'id_lokasi' => $id_lokasi,
        'nama_lokasi' => $nama_lokasi
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
    $lokasi = $this->model->where('id_lokasi', $id)->first();
    if ($lokasi !== null && $lokasi['id_lokasi'] != $idLama) {
      $this->data['invalidId'] = "Id lokasi " . $lokasi['id_lokasi'] . " sudah ada";
    }
    $lokasi = $this->model->where('nama_lokasi', $nama)->first();
    if ($lokasi !== null && $lokasi['nama_lokasi'] != $namaLama) {
      $this->data['invalidNama'] = "Nama lokasi " . $lokasi['nama_lokasi'] . " sudah ada";
    }
    if (empty($this->data['invalidId']) && empty($this->data['invalidNama'])) {
      $this->model->where('id_lokasi', $idLama)->set(['id_lokasi' => $id, 'nama_lokasi' => $nama])->update();
      $this->data['status'] = true;
    }
    return json_encode($this->data);
  }

  public function cari()
  {
    $id = $this->request->getPost('id');
    $data = $this->model->where('id_lokasi', $id)->first();
    return json_encode($data);
  }

  public function CekID($id, $nama_lokasi)
  {
    if (empty($id)) {
      $this->data['invalidId'] = "Id lokasi tidak boleh kosong";
    } elseif ($this->model->where('id_lokasi', $id)->countAllResults() > 0) {
      $this->data['invalidId'] = "Id lokasi sudah ada";
    }
    if (empty($nama_lokasi)) {
      $this->data['invalidNama'] = "Nama lokasi tidak boleh kosong";
    } elseif ($this->model->where('nama_lokasi', $nama_lokasi)->countAllResults() > 0) {
      $this->data['invalidNama'] = "Nama lokasi sudah ada";
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
    $hapus = ($this->model->where('id_lokasi', $id)->delete());
    if ($hapus) return json_encode(['status' => true]);
    else return json_encode(['status' => false]);
  }
}
