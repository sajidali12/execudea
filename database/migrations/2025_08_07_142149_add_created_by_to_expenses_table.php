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
        Schema::table('expenses', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            
            // Change category from enum to string
            $table->dropColumn('category');
        });
        
        Schema::table('expenses', function (Blueprint $table) {
            $table->string('category')->nullable();
            
            // Drop payment_method enum and add as string
            $table->dropColumn('payment_method');
        });
        
        Schema::table('expenses', function (Blueprint $table) {
            $table->string('payment_method')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('vendor_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn(['created_by', 'receipt_number', 'vendor_name', 'payment_method', 'category']);
        });
        
        Schema::table('expenses', function (Blueprint $table) {
            $table->enum('payment_method', ['cash', 'bank_transfer', 'credit_card', 'check', 'online'])->default('cash');
            $table->enum('category', ['salary', 'software', 'hardware', 'courses', 'marketing', 'office_rent', 'utilities', 'travel', 'other'])->default('other');
        });
    }
};
