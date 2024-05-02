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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('site');
            $table->string('slug');
            $table->string('title');
            $table->string('page_type');
            $table->text('main_content')->nullable();
            $table->json('additional_content');
            $table->tinyInteger('is_active')->default(0);
            $table->integer('revision');
            $table->timestamps();

            $table->unique(['site', 'page_type', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
