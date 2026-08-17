<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('path');
            $table->string('mime_type');
            $table->bigInteger('size');
            $table->string('alt_text')->nullable();
            $table->string('caption')->nullable();
            $table->string('usage')->nullable();
            $table->unsignedBigInteger('usage_id')->nullable();
            $table->timestamps();
            $table->index(['usage', 'usage_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
