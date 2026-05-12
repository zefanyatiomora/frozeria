@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">

        {{-- HEADER --}}
        <div class="d-flex align-items-center gap-2 mb-4">
            <a href="{{ route('kategori.index') }}" class="btn btn-light btn-sm border">
                ← Kembali
            </a>
            <h5 class="mb-0 fw-semibold">Tambah Kategori</h5>
        </div>

        {{-- FORM --}}
        <form action="{{ route('kategori.store') }}" method="POST" style="max-width:600px;">
            @csrf

            {{-- NAMA --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Nama kategori <span class="text-danger">*</span>
                </label>
                <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror"
                    value="{{ old('nama_kategori') }}" placeholder="Contoh: Ayam">

                @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Deskripsi (opsional)
                </label>
                <textarea name="deskripsi" rows="3" class="form-control" placeholder="Produk berbahan dasar ayam beku...">{{ old('deskripsi') }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('kategori.index') }}" class="btn btn-light border">
                    Batal
                </a>

                <button type="submit" class="btn btn-success">
                    Simpan Kategori
                </button>
            </div>

        </form>

    </div>
@endsection
