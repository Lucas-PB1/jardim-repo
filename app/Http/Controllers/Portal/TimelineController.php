<?php

namespace App\Http\Controllers\Portal;

use App\Http\Traits\AppTrait;
use App\Models\CMS\Timeline;
use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
    use AppTrait;

    public $table;
    public function __construct()
    {
        $this->table = new Timeline();
    }
    public function index()
    {
        return view('portal.timeline.index', ['data' => $this->table->orderByRaw('CAST(ordem AS UNSIGNED) DESC')->get()]);
    }

    public function show($id)
    {
        return view('portal.timeline.show', ['data' => $this->table->find($id)]);
    }
}
