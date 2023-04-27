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
        Schema::table('users', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('description')->nullable();;
            $table->enum('status', ['Actively looking', 'Open', 'Close'])->default('Close');
            $table->enum('experience_level', ['Junior', 'Mid', 'Senior', 'Lead'])->default('Junior');
            $table->string('location')->nullable();
            $table->string('phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'description',
                'status',
                'experience_level',
                'location',
                'phone_number',
            ]);
        });
    }
};
