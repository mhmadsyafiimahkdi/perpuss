<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['judul_buku', 'pengarang', 'jenis_buku', 'tahun_terbit', 'sampul'];
}
