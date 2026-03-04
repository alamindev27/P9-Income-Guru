<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'heading_1' => 'Revolutionizing',
                'heading_2' => 'Digital Futures',
                'short_description' => 'Unlock the potential of modern web development with innovative solutions. We build scalable, high-performance applications designed for tomorrow.',
                'image' => '/default/hero-bg.jpg',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
