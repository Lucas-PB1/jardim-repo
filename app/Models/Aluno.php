<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AlunoResetPasswordNotification as ResetPasswordNotificationAluno;

class Aluno extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'data_nascimento',
        'genero',
        'nome_social'

    ];

    /**
     * Os atributos que devem ser ocultos para arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotificationAluno($token));
    }
}
