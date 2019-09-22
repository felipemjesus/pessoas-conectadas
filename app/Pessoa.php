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

    public function pessoasRelacionadas()
    {
        if ($this->interesses->isEmpty()) {
            return $this->relacionadasPorLocalidade();
        }

        $pessoasRelacionadas = [];
        foreach ($this->interesses as $interesse) {
            $pessoasRelacionadas = array_merge($pessoasRelacionadas, $interesse->pessoas->toArray());
            $pessoasRelacionadas = array_filter($pessoasRelacionadas, function ($pessoasRelacionada) {
                return $pessoasRelacionada['id'] != $this->id ? $pessoasRelacionada : null;
            });
        }
        return $pessoasRelacionadas;
    }

    public function relacionadasPorLocalidade()
    {
        return $this->where('localidade', $this->localidade)
            ->where('id', '!=', $this->id)
            ->get()
            ->toArray();
    }

    public function interessesTextarea()
    {
        $interesses = array_map(function ($interesse) {
            return $interesse['descricao'];
        }, $this->interesses->toArray());

        return implode("\r\n", $interesses);
    }
}
