<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimensiBuku extends Model
{
    protected $table = 'dimensibuku';
    protected $primaryKey = 'ID_Buku';
    protected $fillable = [
        'Nama_Buku',
        'Harga',
        'Jumlah_Halaman',
        'Rating',
    ];
    public $timestamps = false; // Nonaktifkan otomatis timestamps
}
