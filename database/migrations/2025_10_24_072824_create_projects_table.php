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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users', 'id')->onDelete('cascade');
            $table->string('title', 150);
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories', 'id')->onDelete('cascade');
            $table->enum('status', ['open', 'in progress', 'completed']);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
