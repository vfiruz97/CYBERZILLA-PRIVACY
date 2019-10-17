<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
                'name' => 'admin',
                'description' => 'Имеет все права администратора'
            ],
            [
                'name' => 'user',
                'description' => 'Имеет ограниченные права'
            ],
        ];

        DB::table('roles')->insert($data);
    }
}
