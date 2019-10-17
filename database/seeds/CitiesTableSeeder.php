<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'name' => 'Москва', ],
            [ 'name' => 'Санкт-Петербург', ],
            [ 'name' => 'Новосибирск', ],
            [ 'name' => 'Екатеринбург', ],
            [ 'name' => 'Нижний Новгород', ],
            [ 'name' => 'Казань', ],
            [ 'name' => 'Челябинск', ],
            [ 'name' => 'Омск', ],
            [ 'name' => 'Самара', ],
            [ 'name' => 'Ростов-на-Дону', ],
            [ 'name' => 'Уфа', ],
            [ 'name' => 'Красноярск', ],
            [ 'name' => 'Воронеж', ],
            [ 'name' => 'Пермь', ],
            [ 'name' => 'Волгоград', ],
            [ 'name' => 'Другой', ],
        ];

        DB::table('cities')->insert($data);
    }
}
