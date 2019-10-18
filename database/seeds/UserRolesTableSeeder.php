<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
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
                'user_id' => 1,
                'role_id' => 1,
                'slug' => 'админ'
            ],
        ];

        DB::table('user_roles')->insert($data);

        for ($i=2; $i<5002; $i++) {
            $data = [
                [
                    'user_id' => $i,
                    'role_id' => 2,
                    'slug' => 'пользователь'
                ],
            ];

            DB::table('user_roles')->insert($data);
        }
    }
}
