<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = BarangModel::with('kategori');

        if ($request->filled('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        $barang = $query->latest()->paginate(5);
        $barang->appends($request->all());

        $kategori = KategoriModel::all();

        $totalBarang = BarangModel::count();

        $totalKategori = KategoriModel::count();

        $stokMenipis = BarangModel::where('jumlah_stok', '<', 20)
            ->where('jumlah_stok', '>', 0)
            ->count();

        $stokHabis = BarangModel::where('jumlah_stok', 0)->count();

        return view('dashboard.index', compact(
            'barang',
            'kategori',
            'totalBarang',
            'totalKategori',
            'stokMenipis',
            'stokHabis'
        ));
    }

    public function create()
    {
        $kategori = KategoriModel::all();

        return view('dashboard.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kategori'   => 'required',
            'nama_barang'   => 'required',
            'jumlah_stok'   => 'required|integer',
            'stok_minimum'  => 'required|integer',
            'satuan'        => 'required',
            'harga_jual'    => 'required|numeric',
            'harga_beli'    => 'required|numeric',
            'berat'    => 'required',
            'lokasi_simpan'    => 'required',
            'deskripsi'    => 'required',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('barang', 'public');
        }

        BarangModel::create($validated);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function show($id)
    {
        $barang = BarangModel::with('kategori')->findOrFail($id);

        return view('dashboard.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = BarangModel::findOrFail($id);

        $kategori = KategoriModel::all();

        return view('dashboard.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori'   => 'required',
            'nama_barang'   => 'required',
            'jumlah_stok'   => 'required|integer',
            'stok_minimum'  => 'required|integer',
            'satuan'        => 'required',
            'harga_jual'    => 'required|numeric',
            'harga_beli'    => 'required|numeric',
            'berat'    => 'required',
            'lokasi_simpan'    => 'required',
            'deskripsi'    => 'required',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $barang = BarangModel::findOrFail($id);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('barang', 'public');
        }

        $barang->update($data);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = BarangModel::findOrFail($id);

        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}
