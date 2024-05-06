<?php

namespace App\Http\Controllers\Portal;

use App\Models\CMS\Timeline;
use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
    public $table;
    public function __construct()
    {
        $this->table = new Timeline();
    }
    public function index()
    {
        return view('portal.timeline.index', ['data' => $this->table->all()]);
    }
}
