<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'logo' => 'uploads/settings/logo.png',
            'facebook_contact' => 'https://www.facebook.com',
            'instagram_contact' => 'https://www.instagram.com',
            'youtube_channel' => 'https://www.youtube.com',
            'email' => 'huyb1909921@student.ctu.edu.vn',
            'phone' => '0962785101',
            'about' => 'Website được viết bằng Framework Laravel 9, PHP, NodeJS, JavaScript và Boostrap 5',
        ]);
    }
}
