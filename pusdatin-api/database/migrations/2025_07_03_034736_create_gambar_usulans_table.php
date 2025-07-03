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
        Schema::create('gambar_usulans', function (Blueprint $table) {
            $table->id();
            $table->string('file_path')->comment('Path to the image file');
            $table->foreignId('usulan_id')
                ->constrained('usulans')
                ->onDelete('cascade')
                ->comment('ID of the usulan this image belongs to');
            $table->string('keterangan')->nullable()->comment('Optional description of the image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_usulans');
    }
};
