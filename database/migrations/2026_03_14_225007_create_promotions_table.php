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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('heading_top')->default('আজকের শিওর উইন মাল্টি লাইভ! ফ্রি কোড নিয়ে এখনই খেলুন এবং প্রতিদিনের জয়ের সুযোগ নিন – দেরি করলে আজকের প্রফিট মিস হয়ে যেতে পারে।');
            $table->string('animated_text')->default('অবশ্যই আপনার খুলা একাউন্ট টি ভেরিফাইড থাকতে হবে एবং न्यूनतम १००० टाका डिपोजिट करते होए');
            $table->string('banner')->default('default/default-promotional.jpg');
            $table->string('heading_bottom')->default('ফ্রি মাল্টি কোড পেতে হলে অবশ্যই সঠিক প্রোমোকোড ব্যবহার করে একাউন্ট ওপেন করুন, অন্যথায় কোড প্রদান করা সম্ভব হবে না।');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
