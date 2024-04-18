<?php

namespace App\Repositories\Eloquent\Alunos;

use App\Models\Portal\Alunos;
use App\Repositories\Repository;
use App\Repositories\Contracts\IAlunosRepository;

class AlunosRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Alunos();
    }

    protected function structureUpInsert($request): array
    {
        $fields = array_keys($request);
        return $this->filter_request($request, $fields);
    }
}
