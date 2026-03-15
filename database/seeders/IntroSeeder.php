<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('intros')->insert([
            [
                'animated_text' => 'Welcome to our channel!',
                'heading_1' => 'Revolutionizing',
                'heading_2' => 'Digital Futures',
                'image' => '/default/hero-bg.jpg',
                'winning_link' => 'https://www.example.com/winning',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
