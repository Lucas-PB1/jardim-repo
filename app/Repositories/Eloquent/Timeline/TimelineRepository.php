<?php

namespace App\Repositories\Eloquent\Timeline;

use App\Repositories\Contracts\ITimelineRepository;
use App\Models\CMS\Timeline;
use App\Repositories\Repository;

class TimelineRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Timeline();
    }

    protected function structureUpInsert($request): array
    {
        $fields = array_keys($request);
        return $this->filter_request($request, $fields);
    }
}