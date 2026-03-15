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
                'author_name' => 'Admin',
                'voice' => 'default/default-voice.mp3',
                'timer' => json_encode([
                    'hours' => 10,
                    'minutes' => 0,
                    'seconds' => 0,
                ]),
            ]
        ]);

    }
}
