@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm border">
                    ← Kembali
                </a>
                <h5 class="mb-0 fw-semibold">Detail Barang</h5>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('barang.edit', $barang->id_barang) }}" class="btn btn-sm btn-outline-primary">
                    Edit Barang
                </a>

                <form action="{{ route('barang.destroy', $barang->id_barang) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus data?')" class="btn btn-sm btn-outline-danger">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        {{-- KONTEN --}}
        <div class="bg-white border rounded p-3">

            <div class="row">

                {{-- FOTO --}}
                <div class="col-md-2 text-center">
                    @if ($barang->foto)
                        <img src="{{ asset('storage/' . $barang->foto) }}" class="img-fluid rounded border"
                            style="max-height:100px; object-fit:cover;">
                    @else
                        <div class="border rounded d-flex align-items-center justify-content-center" style="height:100px;">
                            <i class="fa-regular fa-image text-muted"></i>
                        </div>
                    @endif
                </div>

                <div class="col-md-10">

                    <h5 class="fw-semibold mb-1">
                        {{ $barang->nama_barang }}
                    </h5>

                    <span class="badge bg-light text-dark border">
                        {{ $barang->kategori->nama_kategori ?? '-' }}
                    </span>

                </div>

            </div>

            {{-- DETAIL GRID --}}
            <div class="row mt-3">

                <div class="col-md-6 mb-3">
                    <small class="text-muted">Jumlah stok</small>
                    <div class="border rounded p-2">
                        {{ $barang->jumlah_stok }} {{ $barang->satuan }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <small class="text-muted">Stok minimum</small>
                    <div class="border rounded p-2">
                        {{ $barang->stok_minimum }} {{ $barang->satuan }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <small class="text-muted">Harga jual</small>
                    <div class="border rounded p-2">
                        Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <small class="text-muted">Harga beli</small>
                    <div class="border rounded p-2">
                        Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <small class="text-muted">Berat / ukuran</small>
                    <div class="border rounded p-2">
                        {{ $barang->berat ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <small class="text-muted">Lokasi simpan</small>
                    <div class="border rounded p-2">
                        {{ $barang->lokasi_simpan ?? '-' }}
                    </div>
                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div class="mt-2">
                <small class="text-muted">Deskripsi</small>
                <div class="border rounded p-2">
                    {{ $barang->deskripsi ?? '-' }}
                </div>
            </div>

        </div>

    </div>
@endsection
