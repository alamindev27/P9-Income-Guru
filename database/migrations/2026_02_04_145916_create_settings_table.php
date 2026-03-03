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
            $table->string('author_name')->nullable();
            $table->string('logo')->default('default/logo.png');
            $table->string('favicon')->default('default/favicon.png');
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('copywright')->default('©Alamindev27 2026 | All Rights Reserved.');
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('facebook_link')->nullable();
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
