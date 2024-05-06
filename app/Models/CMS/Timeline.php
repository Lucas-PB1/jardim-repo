<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timeline extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'timelines';

    protected $fillable = [
        
        'nome-do-evento',
        'ordem',
        'texto',

    ];

    public function destaque()
    {
        return $this->hasOne(Archives::class, 'reference_id', 'id')->where('table', 'timelines')->where('highlight', true);
    }
}