@extends('layouts.app')
@section('content')
    <div class="container-fluid py-3">
        <div class="card-body bg-light">
            <h5 class="fw-bold mb-4">Panduan Penggunaan Sistem</h5>

            <div class="border rounded p-3 bg-white mb-3">
                <h6 class="fw-bold">Cara menambah barang baru</h6>
                <table class="table table-bordered table-sm mb-0">
                    <tbody>
                        <tr>
                            <td width="40">1</td>
                            <td>Buka halaman <b>Dashboard</b>, klik tombol <b>+ Tambah Barang</b> di kanan atas.</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Unggah foto barang (opsional), lalu isi formulir: nama, kategori, satuan, jumlah stok,
                                harga, dan lainnya.</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Klik <b>Simpan Barang</b>. Barang akan muncul di daftar dashboard.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="border rounded p-3 bg-white mb-3">
                <h6 class="fw-bold">Cara update stok barang masuk</h6>
                <table class="table table-bordered table-sm mb-0">
                    <tbody>
                        <tr>
                            <td width="40">1</td>
                            <td>Temukan barang di dashboard menggunakan kolom pencarian atau filter kategori.</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Klik tombol <b>Edit</b> pada baris barang tersebut.</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ubah nilai <b>Jumlah stok</b> sesuai kondisi saat ini, lalu klik <b>Simpan Barang</b>.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="border rounded p-3 bg-white mb-3">
                <h6 class="fw-bold">Cara mengelola kategori</h6>
                <table class="table table-bordered table-sm mb-0">
                    <tbody>
                        <tr>
                            <td width="40">1</td>
                            <td>Buka halaman <b>Kategori</b> dari navigasi atas.</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tambah, edit, atau hapus kategori sesuai kebutuhan toko.</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Menghapus kategori tidak akan menghapus barang — barang akan menjadi tidak berkategori.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="alert alert-light border mb-3">
                <i class="bi bi-info-circle"></i>
                Satuan barang diisi bebas sesuai kebutuhan — misalnya: <b>pcs, pack, box, kg, liter</b>, dan lain-lain.
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-dark text-white fw-bold">
                    Informasi Detail
                </div>
                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <tr>
                            <th width="200">Nama</th>
                            <td>Zefanya Tiomora</td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td>2241760118</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>SIB 4B</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>Jl. Raya Tlogomas 14 Tlogomas, Lowokwaru, Kota Malang</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>081234567890</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>zefanyatiomora@gmail.com</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
