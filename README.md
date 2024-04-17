# PROJEK TUGAS BESAR MATA KULIAH WEB LANJUTAN

## Petunjuk

1. pertama kali buat projek lakukan :

- buat folder baru dengan nama TB_WEB_LANJUT
- masuk ke folder tersebut
- klik kanan dan pilih gitbash here (pastikan sudah install gitbash)
- Ketikan perintah pada gitbash yang terbuka sebagai berikut
- git clone https://github.com/Ilim-Hilimuddin/MarketingSurveyorApp.git
- cd MarketingSurveyorApp
- composer install (pastikan sudah install composer)
- code . (perhatikan setelah code spasi dan titik)
- Buka terminal di vscode (CTRL + ~) ~ ada disamping angka 1 lalu ketikan:
- php spark serve
- buka browser ketikkan : http://localhost:8080/admin/dashboard
- JIka muncul tampilan dashboard berati instalasi berhasil dengan baik.

2. Kerjakan tugas sesuai jobdesk pada projek (buka github, cari projek)
3. Setelah selesai mengerjakan lakukan hal berikut :

- Jalankan pada terminal di vscode (CTRL + ~) ~ ada disamping angka 1:
- git branch nama-nim (enter)
- git checkout nama-nim
- git add . (perhatikan setelah add kasih spasi dan titik)
- git commit -m "keterangan (mis: pembuatan halaman login by ferry)"
- git push -u origin nama-nim
- buka github > klik compare & pull request
- Laporkan jika sudah selesai ke grup kelompok
- Selesai

4. Lakukan git pull jika ada perubahan pada repositori

#TODO
1. Membuat view:
- Dasboard 	✅
- Data pengguna ✅	
- Data Transaksi ✅
- Login  ✅		
- Data Barang ✅
- Data Lokasi ✅
- Laporan
- Profil
- Info 
2. Pada dashboard Menambahkan fitur :
- Profil :
- foro profil
- Lihat Profil
- Edit Profil
- Info
3. Filter tampilan fitur :
- Admin	: Seluruh fitur tampil [Mengakses seluruh fitur] ✅
- Sales	: Hanya menampilkan fitur: Profil, Data transaksi, dan laporan ✅
4. Fiter fitur Data transaksi
- Admin	: 
-- Dapat melihat seluruh data transaksi semua user 
-- Dapat menambah, merubah, melihat detail, dan menghapus data transaksi
- Sales	: 
-- Hanya dapat melihat data sendiri
-- Menambahkan data transaksi
-- melihat detail data transaksi
-- Merubah data transaksi
5. Membuat tabel :
- User ✅
- Barang ✅
- Lokasi ✅
- Transaksi ✅
- Developer ✅
6. Membuat Model untuk semua tabel. ✅
7. Membuat modul :
- Login  ✅
- User :
-- Tambah user
--- Id_user :
---- Admin -> ADM-XXX (XXX -> angka 001 – 999)
---- Sales -> SLS-XXX
Validasi inputan :
o	Pemberian id menyesuaikan dengan rolenya:
Jika role yang dipilih Admin, maka id_user menjadi ADM-XXX
Jika role yang dipilih Sales, maka id_user menjadi SLS-XXX
Id_User harus unik
o	Input role berupa list diambil dari tabel role
o	Input nama harus kapital, tidak boleh kosong
o	Input email harus valid, harus unik, tidak boleh kosong
o	Input telepon harus angka, tidak boleh kosong
o	Input alamat, boleh kosong
o	Input password min 8 karakter, tidak boleh kosong
o	Input repeat password harus sama dengan password, tidak boleh kosong
o	Input foto, boleh kosong, jika kosong isi dengan nilai default “default.jpg”
•	Edit user
•	Hapus user
•	Detail user
•	Pencarian
•	Pagination
•	Barang :  
•	Tambah barang ✅
Kode barang	: BRG-XXX
•	Edit barang ✅ 
•	Hapus barang ✅
•	Pencarian ✅
•	Pagination ✅ 
•	Lokasi :
•	Tambah lokasi ✅
Kode Lokasi : LOK-XXX
•	Edit lokasi ✅
•	Hapus lokasi ✅
•	Pencarian ✅
•	Pagination ✅
•	Transaksi :
•	Tambah transaksi
Kode transaksi : TRS-XXX
•	Edit transaksi
•	Hapus transaksi
•	Detai transaksi
•	Pencarian
•	Pagination
•	Cetak
•	Laporan :
•	Buat laporan bentuk excel
•	Buat laporan bentuk pdf
•	Chart :
•	Buat chart donuts
•	Buat chart bar
•	Profil :
•	Tampil profil
•	Edit Profil
8.	Mengisi data dummy
9.	Pengetesan
10.	Pengumpulan




