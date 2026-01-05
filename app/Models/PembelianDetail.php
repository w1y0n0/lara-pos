<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    protected $table = 'pembelian_detail';
    protected $primaryKey = 'id_pembelian_detail';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(
            Produk::class,
            'id_produk',     // FK di pembelian_detail
            'id_produk'      // PK di produk
        );

        // Artinya: "Setiap pembelian_detail MILIK SATU produk"
        // Kasus: FK ada di tabel ini  | Relasi: belongsTo
        // Kasus: FK ada di tabel lain | Relasi: hasMany / hasOne
    }
}
