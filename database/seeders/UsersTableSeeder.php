<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'      => 'Егор Репьёв',
                'email'     => 'repiev.egor@nttek.ru',
                'password'  => bcrypt(str_random(16)),
            ],
            [
                'name'      => 'Михаил Привалов',
                'email'     => 'privalov.mihail@nttek.ru',
                'password'  => bcrypt(12341),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
