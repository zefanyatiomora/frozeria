<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriModel;

class BarangModel extends Model
{
    protected $table = 'barang';

    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_kategori',
        'nama_barang',
        'jumlah_stok',
        'stok_minimum',
        'satuan',
        'harga_jual',
        'harga_beli',
        'berat',
        'lokasi_simpan',
        'deskripsi',
        'foto'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori');
    }
}