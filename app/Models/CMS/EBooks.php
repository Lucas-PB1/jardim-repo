<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EBooks extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ebooks';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
    ];

    public function destaque()
    {
        return $this->hasOne(Archives::class, 'reference_id', 'id')->where('table', 'ebooks')->where('highlight', true);
    }

    public function alunos()
    {
        return $this->belongsToMany(Alunos::class, 'aluno_ebook', 'ebook_id', 'aluno_id');
    }
}
