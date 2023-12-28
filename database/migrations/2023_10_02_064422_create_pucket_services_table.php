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
        Schema::create('pucket_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->double('price');
            $table->double('offer');
            $table->foreignId('pucket_id')->constrained()->cascadeOnDelete()->nullable();          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pucket_services');
    }
};
