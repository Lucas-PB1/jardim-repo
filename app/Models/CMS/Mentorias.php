<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mentorias extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mentorias';

    protected $fillable = [

        'nome',
        'preco',
        'descricao',
        'link-de-um-grupo',

    ];

    public function destaque()
    {
        return $this->hasOne(Archives::class, 'reference_id', 'id')->where('table', 'mentorias')->where('highlight', true);
    }
}
