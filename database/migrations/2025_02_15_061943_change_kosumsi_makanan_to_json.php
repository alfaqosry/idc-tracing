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
        Schema::table('tesdiabetes', function (Blueprint $table) {
            $table->json('kosumsi_makanan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tesdiabetes', function (Blueprint $table) {
            $table->string('kosumsi_makanan')->change();
        });
    }
};
