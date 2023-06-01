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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_id');
            $table->string('title');
            $table->string('slug');
            $table->string('category');
            $table->text('content');
            $table->string('image');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
            $table->foreign('students_id')
            ->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
