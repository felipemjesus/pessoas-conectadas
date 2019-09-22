<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome', 'foto', 'email', 'data_nascimento', 'localidade'];

    public function interesses()
    {
        return $this->belongsToMany('App\Interesse', 'pessoas_interesses');
    }
}
