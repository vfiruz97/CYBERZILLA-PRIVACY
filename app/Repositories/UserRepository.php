<?php

namespace App\Repositories;

use App\Model\User as Model;

class UserRepository extends CoreRepository
{
    protected function getModelClass() {
        return Model::class;
    }

    public function getAllWithPagination() {
        $columns = [
            'id',
            'name',
            'surname',
            'email',
            'city_id',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->with(['city:id,name', 'role:user_id,role_id'])
            ->orderBy('id', 'ASC')
            ->paginate(10);

        return $result;
    }
}
