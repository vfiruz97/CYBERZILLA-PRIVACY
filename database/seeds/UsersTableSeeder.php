<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@vfiruz.ru',
                'password' => bcrypt('123admin'),
                'city_id' => rand(1, 15),
                'surname' => 'Admin',
                'age' => '23',
                'about' => 'Я администратор.',
            ],
        ];

        DB::table('users')->insert($data);

        for ($i=0; $i<1000; $i++) {
            $data = [
                [
                    'name' => $faker->firstName,
                    'email' => "user$i@gmail.com",
                    'password' => bcrypt('user'.$i),
                    'city_id' => rand(1, 15),
                    'surname' => $faker->lastName,
                    'age' => rand(15, 70),
                    'about' => $faker->text(rand(40, 100)),
                ],
            ];

            DB::table('users')->insert($data);
        }

    }
}
