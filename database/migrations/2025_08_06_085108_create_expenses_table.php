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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('category', ['salary', 'software', 'hardware', 'courses', 'marketing', 'office_rent', 'utilities', 'travel', 'other'])->default('other');
            $table->decimal('amount', 10, 2);
            $table->date('expense_date');
            $table->string('vendor')->nullable();
            $table->enum('payment_method', ['cash', 'bank_transfer', 'credit_card', 'check', 'online'])->default('cash');
            $table->string('receipt_file')->nullable(); // Path to uploaded receipt
            $table->enum('status', ['pending', 'approved', 'paid', 'rejected'])->default('pending');
            $table->foreignId('project_id')->nullable()->constrained()->onDelete('set null'); // For project-specific expenses
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
