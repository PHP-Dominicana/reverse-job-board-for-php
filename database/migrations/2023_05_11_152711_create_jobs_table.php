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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description');
            $table->string('location')->nullable();
            $table->string('remote_policy')->nullable();
            $table->string('job_type')->nullable();
            $table->string('company_name')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('experience_level')->nullable();
            $table->string('photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
