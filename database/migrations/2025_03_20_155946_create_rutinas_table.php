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
        Schema::create('rutinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('fechaCreacion');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('rutinas');
    }
};
