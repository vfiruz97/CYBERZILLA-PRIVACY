<?php

namespace App\Repositories;

use App\Model\City as Model;

class CityRepository extends CoreRepository
{
    protected function getModelClass() {
        return Model::class;
    }

    public function getAllCitiesList() {
        $result = $this->startConditions()->all();
        return $result;
    }
}
