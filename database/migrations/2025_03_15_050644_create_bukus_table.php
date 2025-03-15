<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('jenis_buku');
            $table->integer('tahun_terbit');
            $table->string('sampul')->nullable(); // Kolom untuk menyimpan path gambar sampul
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};