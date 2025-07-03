<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usulans', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->comment('Judul usulan');
            $table->text('deskripsi')->comment('Deskripsi usulan');
            $table->string('pengusul')->comment('Nama pengusul');
            $table->string('kode_wilayah')->comment('Kode wilayah pengusul');
            $table->decimal('latitude', 10, 7)->comment('Latitude lokasi usulan');
            $table->decimal('longitude', 10, 7)->comment('Longitude lokasi usulan');
            $table->foreignId('skpd_id')->constrained('skpds')->onDelete('cascade')->comment('ID SKPD yang mengusulkan');
            $table->foreignId('periode_id')->constrained('periodes')->onDelete('cascade')->comment('ID Periode usulan');
            $table->foreignId('status_usulan_id')->constrained('status_usulans')->onDelete('cascade')->comment('ID Status usulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usulans');
    }
};
