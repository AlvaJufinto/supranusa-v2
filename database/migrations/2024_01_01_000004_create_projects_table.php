<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('brand')->nullable();
            $table->year('year')->nullable();
            $table->string('company')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('tags')->nullable();
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->timestamps();

            $table->index('brand');
            $table->index('status');
            $table->index('year');
            $table->index('brand_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
