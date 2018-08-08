<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inscrito
 * @package App\Models
 * @version July 15, 2018, 12:17 am UTC
 *
 * @property string cpf
 * @property string nome
 * @property string profissao
 * @property string endereco
 * @property string bairro
 * @property string numero
 * @property string complemento
 * @property string cep
 * @property string email
 * @property string senha
 * @property boolean compareceu
 * @property boolean pagou
 * @property string cidade
 * @property string estado
 */
class Inscrito extends Model
{
    use SoftDeletes;

    public $table = 'inscritos';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'estado',
        'valor',
        'telefone',
        'nascimento',
        'dia_inscrito'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cpf' => 'string',
        'nome' => 'string',
        'profissao' => 'string',
        'endereco' => 'string',
        'bairro' => 'string',
        'numero' => 'string',
        'complemento' => 'string',
        'cep' => 'string',
        'email' => 'string',
        'senha' => 'string',
        'compareceu' => 'boolean',
        'pagou' => 'boolean',
        'cidade' => 'string',
        'estado' => 'string',
        'valor' => 'float',
        'telefone' => 'string',
        'nascimento' => 'string',
        'dia_inscrito' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cpf' => 'required|unique:inscritos',
        'nome' => 'required',
        'profissao' => 'required',
        'endereco' => 'required',
        'bairro' => 'required',
        'numero' => 'required',
        'cep' => 'required',
        'email' => 'required',
        'senha' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'valor' => 'required',
        'telefone' => 'required',
        'nascimento' => 'required'
    ];

    public function setcpfAttribute($value)
    {
        $semTraco = str_replace('-','',$value);
        $semPonto = str_replace('.','',$value);
        $this->attributes['cpf'] = $semPonto;
    }


}
