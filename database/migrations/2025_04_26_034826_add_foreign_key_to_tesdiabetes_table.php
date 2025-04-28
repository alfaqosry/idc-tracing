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
            $table->foreignId('priode_id')->constrained('priodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tesdiabetes', function (Blueprint $table) {
            $table->dropForeign(['priode_id']);
            $table->dropColumn('priode_id');
        });
    }
};
