<?php

namespace App\Repositories\Eloquent\EBooks;

use App\Repositories\Contracts\IEBooksRepository;
use App\Models\CMS\EBooks;
use App\Repositories\Repository;

class EBooksRepository extends Repository
{
    public function __construct()
    {
        $this->model = new EBooks();
    }

    protected function structureUpInsert($request): array
    {
        $fields = array_keys($request);
        return $this->filter_request($request, $fields);
    }
}
