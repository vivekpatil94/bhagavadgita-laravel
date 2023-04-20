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
       Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('chapter_number');
            $table->unsignedSmallInteger('verses_count');
            $table->string('name');
            $table->string('translation');
            $table->string('transliteration');
            $table->json('meaning');
            $table->json('summary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
