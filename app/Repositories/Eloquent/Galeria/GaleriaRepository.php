<?php

namespace App\Repositories\Eloquent\Galeria;

use App\Repositories\Contracts\IGaleriaRepository;
use App\Models\CMS\Galeria;
use App\Repositories\Repository;

class GaleriaRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Galeria();
    }

    protected function structureUpInsert($request): array
    {
        $fields = array_keys($request);
        return $this->filter_request($request, $fields);
    }
}