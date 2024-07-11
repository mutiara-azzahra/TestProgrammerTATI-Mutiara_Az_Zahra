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
        Schema::create('log_harian_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan_log_harian');
            $table->string('status_log_harian');
            $table->Integer('id_pegawai');
            $table->enum('status', ['A', 'N'])->default('A');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_harian_pegawai');
    }
};
