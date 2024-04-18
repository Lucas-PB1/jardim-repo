<?php

namespace App\Models\Portal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AlunoEbook extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table = 'aluno_ebook';

    protected $fillable = [
        'aluno_id',
        'ebook_id',                
    ];

    
}
