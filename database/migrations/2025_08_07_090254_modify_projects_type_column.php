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
        Schema::table('projects', function (Blueprint $table) {
            // Change type from enum to string
            $table->string('type', 100)->change();
            
            // Also modify status enum to match controller validation
            $table->dropColumn('status');
        });
        
        Schema::table('projects', function (Blueprint $table) {
            $table->enum('status', ['pending', 'active', 'completed', 'on_hold', 'cancelled'])->default('pending')->after('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Revert back to original enum
            $table->enum('type', ['web_development', 'wordpress', 'ux_design', 'seo', 'mobile_app', 'other'])->default('web_development')->change();
            
            // Revert status back to original
            $table->dropColumn('status');
        });
        
        Schema::table('projects', function (Blueprint $table) {
            $table->enum('status', ['planning', 'in_progress', 'on_hold', 'completed', 'cancelled'])->default('planning')->after('type');
        });
    }
};
