<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Võ Đức Huy',
            'email' => 'voduchuy2001@gmail.com',
            'admin' => 1,
            'password' => bcrypt('admin123'),
            'facebook' => 'https://www.facebook.com/VDH.me',
            'instagram' => 'https://www.instagram.com/vd.huy',
            'phone_number' => '0962785101',
        ]);
    }
}
