<?php

namespace App\Models\Portal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
class AlunoMentoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'aluno_mentoria';

    protected $fillable = [
        'aluno_id',
        'mentoria_id',                
    ];
}
