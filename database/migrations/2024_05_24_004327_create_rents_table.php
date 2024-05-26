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
        Schema::create('rents', function (Blueprint $table) {
            $table->id('id_sewa'); // Primary key
            $table->date('tgl_sewa');
            $table->date('tgl_pembayaran');
            $table->enum('status', ['paid', 'unpaid']);
            $table->decimal('total', 10, 2);
            $table->string('NIK');

            // Define foreign key constraint
            $table->foreign('NIK')->references('NIK')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
