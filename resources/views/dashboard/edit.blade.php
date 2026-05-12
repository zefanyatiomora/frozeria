@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">

        <div class="d-flex align-items-center gap-2 mb-3">
            <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm border">
                ← Kembali
            </a>
            <h5 class="mb-0 fw-semibold">Edit Barang</h5>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- FOTO --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Foto barang</label>

                <div class="border rounded text-center p-4" style="border-style: dashed; cursor:pointer;"
                    onclick="document.getElementById('foto').click()">

                    <input type="file" name="foto" id="foto" hidden onchange="previewFoto(event)">

                    <div id="previewWrapper">
                        @if ($barang->foto)
                            <img src="{{ asset('storage/' . $barang->foto) }}" class="img-fluid mb-2"
                                style="max-height:120px;">
                        @else
                            <i class="fa-regular fa-image fa-2x text-muted"></i>
                        @endif
                    </div>

                    <div class="text-muted">
                        Klik untuk memilih foto
                    </div>
                </div>
            </div>

            {{-- GRID --}}
            <div class="row">

                {{-- LEFT --}}
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama barang *</label>
                        <input type="text" name="nama_barang" class="form-control"
                            value="{{ old('nama_barang', $barang->nama_barang) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kategori *</label>
                        <select name="id_kategori" class="form-select">
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id_kategori }}"
                                    {{ $barang->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah stok *</label>
                        <input type="number" name="jumlah_stok" class="form-control"
                            value="{{ old('jumlah_stok', $barang->jumlah_stok) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga jual (Rp)</label>
                        <input type="number" name="harga_jual" class="form-control"
                            value="{{ old('harga_jual', $barang->harga_jual) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Berat / ukuran</label>
                        <input type="text" name="berat" class="form-control"
                            value="{{ old('berat', $barang->berat) }}">
                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Satuan *</label>
                        <input type="text" name="satuan" class="form-control"
                            value="{{ old('satuan', $barang->satuan) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Stok minimum *</label>
                        <input type="number" name="stok_minimum" class="form-control"
                            value="{{ old('stok_minimum', $barang->stok_minimum) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga beli (Rp)</label>
                        <input type="number" name="harga_beli" class="form-control"
                            value="{{ old('harga_beli', $barang->harga_beli) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lokasi simpan</label>
                        <input type="text" name="lokasi_simpan" class="form-control"
                            value="{{ old('lokasi_simpan', $barang->lokasi_simpan) }}">
                    </div>

                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('barang.index') }}" class="btn btn-light border">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    Update Barang
                </button>
            </div>

        </form>

    </div>

    {{-- SCRIPT PREVIEW FOTO --}}
    <script>
        function previewFoto(event) {
            const wrapper = document.getElementById('previewWrapper');
            wrapper.innerHTML = '';

            const file = event.target.files[0];
            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.maxHeight = '120px';
                img.classList.add('img-fluid');
                wrapper.appendChild(img);
            }
        }
    </script>

@endsection
