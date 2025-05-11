<?php

use App\Models\Matkul;
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
        Schema::create('tb_matkul', function (Blueprint $table) {
            $table->id();
            $table->int('id_matkul');
            $table->varchar('nama_matkul');
            $table->int('sks');
            $table->varchar('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('matkul');
    // }
};
