<?php

namespace App\Repositories\Eloquent\Mentorias;

use App\Repositories\Contracts\IMentoriasRepository;
use App\Models\CMS\Mentorias;
use App\Repositories\Repository;

class MentoriasRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Mentorias();
    }

    protected function structureUpInsert($request): array
    {
        $fields = array_keys($request);
        return $this->filter_request($request, $fields);
    }
}