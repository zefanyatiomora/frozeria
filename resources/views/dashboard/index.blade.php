@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">

        @if (session('success'))
            <div class="alert alert-success alert-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <div class="border rounded p-3 bg-white">
                    <small class="text-muted">Total barang</small>
                    <h4 class="fw-bold mb-0">{{ $totalBarang }}</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="border rounded p-3 bg-white">
                    <small class="text-muted">Total kategori</small>
                    <h4 class="fw-bold mb-0">{{ $totalKategori }}</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="border rounded p-3 bg-white">
                    <small class="text-muted">Stok menipis</small>
                    <h4 class="fw-bold mb-0">{{ $stokMenipis }}</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="border rounded p-3 bg-white">
                    <small class="text-muted">Stok habis</small>
                    <h4 class="fw-bold mb-0">{{ $stokHabis }}</h4>
                </div>
            </div>
        </div>

        <form method="GET" id="formSearch" class="d-flex gap-2 mb-3">

            <input type="text" name="search" id="searchInput" class="form-control form-control-sm"
                placeholder="Cari nama barang..." value="{{ request('search') }}">

            <select name="kategori" class="form-select form-select-sm" style="max-width:200px;"
                onchange="document.getElementById('formSearch').submit()">
                <option value="">Semua kategori</option>

                @foreach ($kategori as $k)
                    <option value="{{ $k->id_kategori }}" {{ request('kategori') == $k->id_kategori ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach

            </select>

        </form>

        <div class="border rounded bg-white">
            <table class="table table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Harga jual</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($barang as $item)
                        <tr>
                            <td>{{ $item->nama_barang }}</td>

                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $item->kategori->nama_kategori ?? '-' }}
                                </span>
                            </td>

                            <td>
                                @if ($item->jumlah_stok == 0)
                                    <span class="text-danger">{{ $item->jumlah_stok }}</span>
                                @elseif ($item->jumlah_stok < 20)
                                    <span class="text-warning">{{ $item->jumlah_stok }}</span>
                                @else
                                    {{ $item->jumlah_stok }}
                                @endif
                            </td>

                            <td>{{ $item->satuan }}</td>

                            <td>Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>

                            <td>
                                <a href="{{ route('barang.show', $item->id_barang) }}"
                                    class="btn btn-sm btn-outline-secondary">Detail</a>

                                <a href="{{ route('barang.edit', $item->id_barang) }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a>

                                {{-- DELETE --}}
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="openModalHapus('{{ $item->id_barang }}', '{{ $item->nama_barang }}')">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                Belum ada data barang
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {{-- FOOTER TABLE --}}
            <div class="d-flex justify-content-between align-items-center border border-top-0 bg-light px-3 py-2 small">

                <div class="text-muted">
                    Menampilkan {{ $barang->firstItem() }}–{{ $barang->lastItem() }}
                    dari {{ $barang->total() }} barang
                </div>

                <div>
                    {{ $barang->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>

    </div>
    @include('dashboard.hapus')

    <script>
        const formSearch = document.getElementById('formSearch');
        // jika kosong -> otomatis tampil semua
        searchInput.addEventListener('input', function() {
            if (this.value === '') {
                formSearch.submit();
            }
        });

        function openModalHapus(id, nama) {
            document.getElementById('namaBarang').innerText = nama;
            document.getElementById('formHapus').action = '/barang/' + id;

            let modal = new bootstrap.Modal(document.getElementById('modalHapus'));
            modal.show();
        }
    </script>
@endsection
