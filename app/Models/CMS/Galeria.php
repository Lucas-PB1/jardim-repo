<?php

namespace App\Models\CMS;

use App\Http\Traits\HasGaleria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galeria extends Model
{
    use HasFactory, SoftDeletes, HasGaleria;

    protected $table = 'galerias';

    protected $fillable = [
        
        'nome-da-galeria',
        'icone',
        'slug'

    ];

    public function destaque()
    {
        return $this->hasOne(Archives::class, 'reference_id', 'id')->where('table', 'galerias')->where('highlight', true);
    }
}