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
        Schema::table('invoices', function (Blueprint $table) {
            // Drop the current status column
            $table->dropColumn('status');
        });
        
        Schema::table('invoices', function (Blueprint $table) {
            // Add the correct status enum to match controller validation
            $table->enum('status', ['draft', 'pending', 'paid', 'overdue', 'cancelled'])->default('pending')->after('total_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Drop the modified status column
            $table->dropColumn('status');
        });
        
        Schema::table('invoices', function (Blueprint $table) {
            // Restore the original status enum
            $table->enum('status', ['draft', 'sent', 'paid', 'overdue', 'cancelled'])->default('draft')->after('total_amount');
        });
    }
};
