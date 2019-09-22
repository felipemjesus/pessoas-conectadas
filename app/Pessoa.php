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

    /**
     * Metodo para salvar e atualizar oos dados da pessoa
     *
     * @param array $request
     * @param int $id
     * @return void
     */
    public static function saveRequest(array $request, int $id = null)
    {
        $pessoa = null;

        // realiza o upload da foto
        if (isset($request['foto'])) {
            $foto = $request['foto']->store('public');
            $request['foto'] = $foto;
        }

        // realiza o cadastro dos interesses e retorna os ids de cada
        $interesses = Interesse::saveMany($request['interesses']);

        // atualiza os dados da pessoa
        if ($id) {
            $pessoa = self::find($id);
            $pessoa->update($request);
        } else {
            // salva os dados da pessoa
            $pessoa = self::create($request);
        }

        // remove todos os interesses e vincula os interesses a pessoa
        $pessoa->interesses()->detach();
        $pessoa->interesses()->attach($interesses);
    }

    /**
     * Retorna as pessoas relacionadas por interesses ou localidade
     *
     * @return array
     */
    public function pessoasRelacionadas()
    {
        // caso nao tenha interesses, busca por localidade
        if ($this->interesses->isEmpty()) {
            return $this->relacionadasPorLocalidade();
        }
        return $this->relacionadasPorInteresses();
    }

    /**
     * Retorna as pessoas releacionadas por interesses
     *
     * @return array
     */
    public function relacionadasPorInteresses()
    {
        $pessoasRelacionadas = [];
        foreach ($this->interesses as $interesse) {
            $pessoasRelacionadas = array_merge($pessoasRelacionadas, $interesse->pessoas->toArray());
            $pessoasRelacionadas = array_filter($pessoasRelacionadas, function ($pessoasRelacionada) {
                return $pessoasRelacionada['id'] != $this->id ? $pessoasRelacionada : null;
            });
        }
        return $pessoasRelacionadas;
    }

    /**
     * Retorna as pessoas releacionadas por localidade
     *
     * @return array
     */
    public function relacionadasPorLocalidade()
    {
        return $this->where('localidade', $this->localidade)
            ->where('id', '!=', $this->id)
            ->get()
            ->toArray();
    }

    /**
     * Retorna os interesses por linha para apresentar no textarea
     *
     * @return string
     */
    public function interessesTextarea()
    {
        $interesses = array_map(function ($interesse) {
            return $interesse['descricao'];
        }, $this->interesses->toArray());
        return implode("\r\n", $interesses);
    }
}
