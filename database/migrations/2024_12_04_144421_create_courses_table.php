<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('tagline');
            $table->text('description')->nullable();
            $table->string('image_name');
            $table->json('learnings');
            $table->timestamp('released_at')->nullable();
            $table->timestamps(); //Crea dos columans por defecto
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
