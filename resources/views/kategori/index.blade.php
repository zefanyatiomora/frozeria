@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">

        {{-- TITLE --}}
        <h5 class="mb-3 fw-semibold">Daftar Kategori</h5>

        {{-- SEARCH --}}
        <div class="mb-3">
            <form method="GET" id="formSearchKategori">

                <input type="text" name="search" id="searchKategori" class="form-control form-control-sm"
                    placeholder="Cari kategori..." value="{{ request('search') }}">
            </form>
        </div>

        {{-- TABLE --}}
        <div class="border rounded bg-white">
            <table class="table table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama kategori</th>
                        <th>Jumlah barang</th>
                        <th>Dibuat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr>
                            <td>{{ $item->nama_kategori }}</td>

                            <td>
                                {{ $item->barang_count }} barang
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('j M Y') }}
                            </td>

                            <td>
                                <a href="{{ route('kategori.edit', $item->id_kategori) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>

                                <form action="{{ route('kategori.destroy', $item->id_kategori) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                        onclick="openModalHapusKategori('{{ $item->id_kategori }}', '{{ $item->nama_kategori }}')">

                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- FOOTER --}}
            <div class="p-2">
                <small class="text-muted">
                    {{ $kategori->count() }} kategori terdaftar
                </small>
            </div>
        </div>
    </div>
    @include('kategori.hapus')

    <script>
        const searchKategori = document.getElementById('searchKategori');
        const formSearchKategori = document.getElementById('formSearchKategori');

        // tekan enter -> search
        searchKategori.addEventListener('keypress', function(e) {

            if (e.key === 'Enter') {
                e.preventDefault();
                formSearchKategori.submit();
            }

        });

        // jika input kosong -> tampil semua kategori
        searchKategori.addEventListener('input', function() {

            if (this.value === '') {
                formSearchKategori.submit();
            }

        });

        function openModalHapusKategori(id, nama) {

            document.getElementById('namaKategori').innerText = nama;

            document.getElementById('formHapusKategori').action =
                '/kategori/' + id;

            let modal = new bootstrap.Modal(
                document.getElementById('modalHapusKategori')
            );

            modal.show();
        }
    </script>
@endsection
