<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('redes-sociais', function (Blueprint $table) {
            $table->id();
            
            $table->text('nome');
            $table->text('icone');
            $table->text('link')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('cruds')->insert(['titulo' => 'Redes Sociais']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes-sociais');
    }
};