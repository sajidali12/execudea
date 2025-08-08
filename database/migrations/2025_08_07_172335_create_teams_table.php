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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('profile_picture')->nullable();
            $table->decimal('salary', 10, 2);
            $table->date('joining_date');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('bio')->nullable();
            $table->json('skills')->nullable(); // Store skills as JSON array
            $table->string('department')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Link to users table if needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
