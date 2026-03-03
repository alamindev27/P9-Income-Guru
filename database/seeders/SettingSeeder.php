<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'author_name' => 'MD. Al-Amin',
                'instagram_link' => 'https://www.instagram.com/alamndev27',
                'linkedin_link' => 'https://www.linkedin.com/in/alamndev27',
                'github_link' => 'https://www.github.com/alamndev27',
                'facebook_link' => 'https://www.facebook.com/alamndev27',
                'twitter_link' => 'https://www.twitter.com/alamndev27',
            ]
        ]);

    }
}
