<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Export  extends BaseController
{
  public function __construct()
  {
    $this->MTransaksi = new \App\Models\ModelTransaksi();
  }
  public function export_pdf()
  {
    $builder = $this->MTransaksi->builder();
    $builder->select('transaksi.*, user.nama_lengkap as nama_sales, COALESCE(barang.nama_barang, "Barang Terhapus") as nama_barang, lokasi.nama_lokasi as nama_lokasi');
    $builder->join('user', 'user.id_user = transaksi.id_user');
    $builder->join('barang', 'barang.id_barang = transaksi.id_barang', 'left');
    $builder->join('lokasi', 'lokasi.id_lokasi = transaksi.id_lokasi');
    if (!$this->request->getVar('id')) {
      if (session()->get('user')['id_role'] == 2) {
        $builder->where('transaksi.id_user', session()->get('user')['id_user']);
      }
      $data = $this->MTransaksi->findAll();
      $file_name = 'data_survey_' . date('Y-m-d H:i:s') . '.pdf';
      $options = new Options();
      $options->set('isRemoteEnabled', true);
      $options->setChroot(FCPATH . 'assets/img');
      $pdf = new Dompdf($options);
      $pdf->setPaper('A4', 'landscape');
      $pdf->loadHtml(view('report/daftar_pdf', ['data' => $data]));
      $pdf->render();
      $pdf->stream($file_name);
    } else {
      $data = $this->MTransaksi->where('id_transaksi', $this->request->getVar('id'))->first();
      $file_name = 'data_survey_' . $this->request->getVar('id') . '.pdf';
      $options = new Options();
      $options->set('isRemoteEnabled', true);
      $options->setChroot(FCPATH . 'assets/img');
      $pdf = new Dompdf($options);
      $pdf->setPaper('A4', 'landscape');
      $pdf->loadHtml(view('report/detail_pdf', ['data' => $data]));
      $pdf->render();
      $pdf->stream($file_name);
    }
  }

  public function export_excel()
  {
    $builder = $this->MTransaksi->builder();
    $builder->select('transaksi.*, user.nama_lengkap as nama_sales, COALESCE(barang.nama_barang, "Barang Terhapus") as nama_barang, lokasi.nama_lokasi as nama_lokasi');
    $builder->join('user', 'user.id_user = transaksi.id_user');
    $builder->join('barang', 'barang.id_barang = transaksi.id_barang', 'left');
    $builder->join('lokasi', 'lokasi.id_lokasi = transaksi.id_lokasi');
    if (session()->get('user')['id_role'] == 2) {
      $builder->where('transaksi.id_user', session()->get('user')['id_user']);
    }
    $data = $this->MTransaksi->findAll();

    // Inisialisasi spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Merge cells dan set judul
    $sheet->mergeCells('A1:J1');
    $sheet->mergeCells('A2:J2');
    $sheet->setCellValue('A1', 'PT. ABADI SURVEYOR');
    $sheet->setCellValue('A2', 'DAFTAR TRANSAKSI SURVEY MARKETING');

    // Set style untuk judul
    $sheet->getStyle('A1:A2')->applyFromArray([
      'font' => [
        'bold' => true,
        'size' => 16,
      ],
      'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
      ],
    ]);

    // Set header tabel
    $sheet->setCellValue('A4', 'No');
    $sheet->setCellValue('B4', 'ID Transaksi');
    $sheet->setCellValue('C4', 'ID Sales');
    $sheet->setCellValue('D4', 'Nama Sales');
    $sheet->setCellValue('E4', 'Nama Barang');
    $sheet->setCellValue('F4', 'Lokasi');
    $sheet->setCellValue('G4', 'Tanggal Transaksi');
    $sheet->setCellValue('H4', 'Jumlah');
    $sheet->setCellValue('I4', 'Repeat Order');
    $sheet->setCellValue('J4', 'Keterangan');

    // Set style untuk header tabel
    $sheet->getStyle('A4:J4')->applyFromArray([
      'font' => [
        'bold' => true,
      ],
      'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
      ],
      'borders' => [
        'allBorders' => [
          'borderStyle' => Border::BORDER_THIN,
        ],
      ],
    ]);

    // Set lebar kolom
    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(15);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(25);
    $sheet->getColumnDimension('F')->setWidth(25);
    $sheet->getColumnDimension('G')->setWidth(20);
    $sheet->getColumnDimension('H')->setWidth(10);
    $sheet->getColumnDimension('I')->setWidth(10);
    $sheet->getColumnDimension('J')->setWidth(20);

    $sheet->getRowDimension(4)->setRowHeight(30);
    $sheet->getStyle('A4:J4')->getAlignment()->setWrapText(true);
    // Menambahkan data ke dalam tabel
    $i = 5;
    foreach ($data as $key => $value) {
      $sheet->getStyle('B' . $i . ':J' . $i)->getAlignment()->setWrapText(true);
      $sheet->setCellValue('A' . $i, $key + 1);
      $sheet->setCellValue('B' . $i, $value['id_transaksi']);
      $sheet->setCellValue('C' . $i, $value['id_user']);
      $sheet->setCellValue('D' . $i, $value['nama_sales']);
      $sheet->setCellValue('E' . $i, $value['nama_barang']);
      $sheet->setCellValue('F' . $i, $value['nama_lokasi']);
      $sheet->setCellValue('G' . $i, $value['tgl_transaksi']);
      $sheet->setCellValue('H' . $i, $value['jumlah']);
      $sheet->setCellValue('I' . $i, $value['isRepeatOrder'] ? 'Ya' : 'Tidak');
      $sheet->setCellValue('J' . $i, $value['hasil_transaksi']);

      // Set border untuk setiap baris data
      $sheet->getStyle('A' . $i . ':J' . $i)->applyFromArray([
        'borders' => [
          'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
          ],
        ], 'alignment' => [
          'vertical' => Alignment::VERTICAL_TOP,
        ],
      ]);

      // Set wrap text untuk kolom yang diperlukan
      $i++;
    }

    // Set nama file dan header untuk download
    $file_name = 'data_survey_' . date('Y-m-d_H-i-s') . '.xlsx';
    $writer = new Xlsx($spreadsheet);

    // Hindari output lain sebelum header
    ob_clean();
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $file_name . '"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit;
  }
}
