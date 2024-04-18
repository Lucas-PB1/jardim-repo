<?php

namespace App\Models\Portal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CMS\EBooks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Alunos extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, SoftDeletes;

    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'email',
        'data_nascimento',
        'password',
    ];

    public function ebooks()
    {
        return $this->belongsToMany(EBooks::class, 'aluno_ebook', 'aluno_id', 'ebook_id')
                    ->using(AlunoEbook::class)->distinct();
    }
    public function mentorias()
    {
        return $this->belongsToMany(EBooks::class, 'aluno_mentoria', 'aluno_id', 'mentoria_id')
                    ->using(AlunoMentoria::class)->distinct();
    }
    public function carrinho()
    {
        return $this->hasMany(Carrinho::class, 'aluno_id');
    }
    
}
