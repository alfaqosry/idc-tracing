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
        Schema::create('tesdiabetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('tekanan_darah');
            $table->string('kadar_gula');
            $table->string('aktifitas_fisik');
            $table->string('kosumsi_makanan');
            $table->string('merokok');
            $table->string('merokok_pasif')->nullable();
            $table->string('tekanan');
            $table->string('keluarga');
            $table->string('selectkeluarga')->nullable();
            $table->string('totalpoin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tesdiabetes');
    }

    
};
