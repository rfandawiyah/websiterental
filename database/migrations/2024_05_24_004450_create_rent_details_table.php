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
        Schema::create('rent_details', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sewa'); // Foreign key to rents
            $table->char('nopol', 10);  // Foreign key to cars
            $table->integer('lama_sewa');
            $table->date('tgl_pengembalian');
            $table->timestamps(); // Optional: Adds created_at and updated_at columns

            // Define foreign key constraint
            $table->foreign('id_sewa')->references('id_sewa')->on('rents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nopol')->references('nopol')->on('cars')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_details');
    }
};
