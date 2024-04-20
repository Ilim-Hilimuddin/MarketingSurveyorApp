<?php

namespace App\Controllers;

class Transaksi extends BaseController
{
  public function index()
  {
    $keyword = $this->request->getGet('keyword');
    $page = $this->request->getGet('page') ?? 1;
    $MTransaksi = new \App\Models\ModelTransaksi();
    $MUsers = new \App\Models\UserModel();
    $MBarang = new \App\Models\ModelBarang();
    $MLokasi = new \App\Models\ModelLokasi();
    $builder = $MTransaksi->builder();
    $builder->select('transaksi.*, user.nama_lengkap as nama_sales, COALESCE(barang.nama_barang, "Barang Terhapus") as nama_barang, lokasi.nama_lokasi as nama_lokasi');
    $builder->join('user', 'user.id_user = transaksi.id_user');
    $builder->join('barang', 'barang.id_barang = transaksi.id_barang', 'left');
    $builder->join('lokasi', 'lokasi.id_lokasi = transaksi.id_lokasi');
    if (session()->get('user')['id_role'] == 2) {
      $builder->where('transaksi.id_user', session()->get('user')['id_user']);
      $sales = $MUsers->where('id_user', session()->get('user')['id_user'])->findAll();
    } else {
      $sales = $MUsers->where('id_role', 2)->findAll();
    }

    if (!empty($keyword)) {
      $builder->groupStart();
      $builder->like('transaksi.id_transaksi', $keyword);
      $builder->orLike('user.nama_lengkap', $keyword);
      $builder->orLike('barang.nama_barang', $keyword);
      $builder->orLike('lokasi.nama_lokasi', $keyword);
      $builder->orderBy('transaksi.id_transaksi', 'DESC');
      $builder->groupEnd();
    }

    $data['transaksi'] = $MTransaksi->paginate(env('PER_PAGE'), 'gr1', $page);
    $totalRecords = $MTransaksi->pager->getTotal('gr1');
    $data['pager'] = $MTransaksi->pager->makeLinks($page, env('PER_PAGE'), $totalRecords);
    $data['nomor'] = ($this->request->getGet('page') ?? 1) == 1 ? 1 : (($this->request->getGet('page') - 1) * env('PER_PAGE') + 1);

    $data['barang'] = $MBarang->findAll();
    $data['lokasi'] = $MLokasi->findAll();
    $data['sales'] = $sales;
    $data['katakunci'] = $keyword;
    return view('User/survey', $data);
  }


  public function simpan()
  {
    $MTransaksi = new \App\Models\ModelTransaksi();
    $data = [
      'id_transaksi' => $this->request->getPost('idTransaksi'),
      'id_user' => $this->request->getPost('idSales'),
      'id_barang' => $this->request->getPost('idBarang'),
      'id_lokasi' => $this->request->getPost('idLokasi'),
      'tgl_transaksi' => $this->request->getPost('tglTransaksi'),
      'jumlah' => $this->request->getPost('jumlah'),
      'isRepeatOrder' => $this->request->getPost('repeat'),
      'hasil_transaksi' => $this->request->getPost('catatan'),
    ];

    if ($MTransaksi->where('id_transaksi', $data['id_transaksi'])->first()) {
      $response['status'] = false;
      $response['msg'] = "Data transaksi sudah ada";
    } else {
      $MTransaksi->insert($data);
      $response['status'] = true;
    }
    return json_encode($response);
  }

  public function detail()
  {
    $data = $this->getDataById($this->request->getPost('id'));
    return view('User/detail_transaksi', $data);
  }

  public function cetakToPDF()
  {
    $data = $this->getDataById($this->request->getPost('id'));

    // $mpdf = new \Mpdf\Mpdf();
    // $mpdf->WriteHTML(view('User/cetak', $data));
    // $mpdf->Output();
  }

  public function getDataById($id)
  {
    $MTransaksi = new \App\Models\ModelTransaksi();
    $builder = $MTransaksi->builder();
    $builder->select('transaksi.*, user.nama_lengkap as nama_sales, COALESCE(barang.nama_barang, "Barang Terhapus") as nama_barang, lokasi.nama_lokasi as nama_lokasi');
    $builder->join('user', 'user.id_user = transaksi.id_user');
    $builder->join('barang', 'barang.id_barang = transaksi.id_barang', 'left');
    $builder->join('lokasi', 'lokasi.id_lokasi = transaksi.id_lokasi');
    $builder->where('transaksi.id_transaksi', $id);
    $data['transaksi'] = $MTransaksi->first();
    $data['id'] = $id;
    return $data;
  }
}
