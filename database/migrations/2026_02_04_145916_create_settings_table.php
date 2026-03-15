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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Income Guru Offc');
            $table->string('author_name')->nullable();
            $table->float('total_members', 15, 2)->default(16530);
            $table->float('total_won', 15, 2)->default(5182500);
            $table->json('timer');
            $table->string('logo')->default('default/logo.png');
            $table->string('favicon')->default('default/favicon.png');
            $table->string('voice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
