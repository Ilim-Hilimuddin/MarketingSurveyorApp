<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
  protected $table = 'transaksi';
  protected $allowedFields = ['id_transaksi', 'id_user', 'id_barang', 'id_lokasi', 'tgl_transaksi', 'jumlah', 'isRepeatOrder', 'hasil_transaksi'];

  protected $perPage = 5;

  public function getSurveyData()
  {
    $query = $this->db->query("
          SELECT l.nama_lokasi, COUNT(t.id_lokasi) AS total
          FROM transaksi t
          JOIN lokasi l ON t.id_lokasi = l.id_lokasi
          WHERE MONTH(t.tgl_transaksi) = MONTH(CURRENT_DATE()) 
            AND YEAR(t.tgl_transaksi) = YEAR(CURRENT_DATE())
          GROUP BY l.nama_lokasi
      ");
    return $query->getResultArray();
  }

  public function getSurveyDataLast6Months()
  {
    $query = $this->db->query("
        SELECT
            l.nama_lokasi,
            b.nama_barang,
            COUNT(t.id_barang) AS total
        FROM
            transaksi t
        JOIN lokasi l ON t.id_lokasi = l.id_lokasi
        JOIN barang b ON t.id_barang = b.id_barang
        WHERE
            t.tgl_transaksi >= DATE_SUB(CURRENT_DATE(), INTERVAL 6 MONTH)
        GROUP BY
            l.nama_lokasi, b.nama_barang
    ");
    return $query->getResultArray();
  }

  public function getTopLocation()
  {
    $query = $this->db->table("transaksi")
      ->select("l.nama_lokasi, COUNT(transaksi.id_lokasi) AS total")
      ->join("lokasi l", "transaksi.id_lokasi = l.id_lokasi")
      ->groupBy("l.nama_lokasi")
      ->orderBy("total", "DESC")
      ->where("YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())")
      ->limit(1)
      ->get();
    return $query->getRowArray();
  }

  public function getTopSales()
  {
    $query = $this->db->table('transaksi')
      ->select('user.nama_lengkap, SUM(transaksi.jumlah) AS total_penjualan')
      ->join('user', 'transaksi.id_user = user.id_user')
      ->groupBy('user.id_user')
      ->orderBy('total_penjualan', 'DESC')
      ->limit(1)
      ->get();
    return $query->getRowArray();
  }
  public function getTopProduct()
  {
    $query = $this->db->table("transaksi")
      ->select("b.nama_barang, SUM(transaksi.jumlah) AS total")
      ->join("barang b", "transaksi.id_barang = b.id_barang")
      ->groupBy("b.nama_barang")
      ->orderBy("total", "DESC")
      ->limit(1)
      ->get();
    return $query->getRowArray();
  }

  public function getDownProduct()
  {
    $query = $this->db->table("transaksi")
      ->select("b.nama_barang, SUM(transaksi.jumlah) AS total")
      ->join("barang b", "transaksi.id_barang = b.id_barang")
      ->groupBy("b.nama_barang")
      ->orderBy("total", "ASC")
      ->limit(1)
      ->get();
    return $query->getRowArray();
  }
}
