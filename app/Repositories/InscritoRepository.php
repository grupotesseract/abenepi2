<?php

namespace App\Repositories;

use App\Models\Inscrito;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InscritoRepository
 * @package App\Repositories
 * @version July 15, 2018, 12:17 am UTC
 *
 * @method Inscrito findWithoutFail($id, $columns = ['*'])
 * @method Inscrito find($id, $columns = ['*'])
 * @method Inscrito first($columns = ['*'])
*/
class InscritoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cpf',
        'nome',
        'profissao',
        'endereco',
        'bairro',
        'numero',
        'complemento',
        'cep',
        'email',
        'senha',
        'compareceu',
        'pagou',
        'cidade',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Inscrito::class;
    }
}
