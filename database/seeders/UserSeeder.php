<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                ['name' => 'Иванов',
                'email' => 'info@datainlife.ru',
                'password' => bcrypt('12345')], [
                'name' => 'Петров',
                'email' => 'job@datainlife.ru',
                'password' => bcrypt('12345'),
            ]
            ],
        );
    }
}
