<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\CMS\Galeria;

class JardimController extends Controller
{
    public $table;

    public function __construct()
    {
        $this->table = new Galeria();
    }

    public function index($slug){
        return view('portal.index', ['slug' => $slug]);
    }

    public function indexApi($slug){
        $data = $this->table->where('slug', $slug)->first();

        $images = collect($data->galeria)->map(function ($file) {
            return $file->path;
        });

        return $images;
    }

    
}
