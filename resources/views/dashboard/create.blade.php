@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">

        <div class="d-flex align-items-center gap-2 mb-3">
            <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm border">
                ← Kembali
            </a>
            <h5 class="mb-0 fw-semibold">Tambah Barang Baru</h5>
        </div>

        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="form-label fw-semibold">Foto barang</label>

                <div class="border rounded text-center p-4" style="border-style: dashed; cursor:pointer;"
                    onclick="document.getElementById('foto').click()">

                    <input type="file" name="foto" id="foto" hidden>

                    <div class="mb-2">
                        <i class="fa-regular fa-image fa-2x text-muted"></i>
                    </div>

                    <div class="text-muted">
                        Klik untuk memilih foto, atau seret file ke sini
                    </div>
                    <small class="text-muted">
                        Format: JPG, PNG — Maks. 2 MB
                    </small>

                    <div class="mt-2">
                        <span class="btn btn-sm btn-light border">Pilih Foto</span>
                    </div>
                </div>
            </div>

            {{-- FORM GRID --}}
            <div class="row">

                {{-- LEFT --}}
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama barang *</label>
                        <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kategori *</label>
                        <select name="id_kategori" class="form-select">
                            <option value="">Pilih kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id_kategori }}">
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah stok *</label>
                        <input type="number" name="jumlah_stok" class="form-control" value="{{ old('jumlah_stok') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga jual (Rp)</label>
                        <input type="number" name="harga_jual" class="form-control" value="{{ old('harga_jual') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Berat / ukuran</label>
                        <input type="text" name="berat" class="form-control" placeholder="Contoh: 500 gram">
                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Satuan *</label>
                        <input type="text" name="satuan" class="form-control" placeholder="pcs / pack">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Stok minimum</label>
                        <input type="number" name="stok_minimum" class="form-control" value="{{ old('stok_minimum') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga beli (Rp)</label>
                        <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lokasi simpan</label>
                        <input type="text" name="lokasi_simpan" class="form-control" placeholder="Contoh: Rak A-3">
                    </div>

                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="form-control"></textarea>
            </div>

            {{-- BUTTON --}}
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('barang.index') }}" class="btn btn-light border">
                    Batal
                </a>

                <button type="submit" class="btn btn-success">
                    Simpan Barang
                </button>
            </div>

        </form>

    </div>
@endsection
