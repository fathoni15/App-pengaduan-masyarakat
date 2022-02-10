<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'nik' => '112233',
                'email' => 'admin@gmail.com',
                'phone' => '1234567891011',
                'level' => 'admin',
                'password' => bcrypt('12345678'),
            ],
        ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
