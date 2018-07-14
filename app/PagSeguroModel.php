<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PagSeguro;

class PagSeguroModel extends Model
{
    public static function confirmaPagamento($inscrito)
    {
        $data = [
            'items' => [
                [
                    'id' => $inscrito->id,
                    'description' => $inscrito->descricao,
                    'quantity' => '1',
                    'amount' => $inscrito->valor
                ],

            ],
            'shipping' => [
                'address' => [
                    'postalCode' => $inscrito->cep,
                    'street' => $inscrito->endereco,
                    'number' => $inscrito->numero,
                    'district' => $inscrito->bairro,
                    'city' => $inscrito->cidade,
                    'state' => $inscrito->estado,
                    'country' => 'BRA',
                ],
            ],
            'sender' => [
                'email' => $inscrito->email,
                'name' => $inscrito->nome,
                'documents' => [
                    [
                        'number' => $inscrito->cpf,
                        'type' => 'CPF'
                    ]
                ],
                'phone' => $inscrito->telefone,
                'bornDate' => $inscrito->nascimento,
            ]
        ];

        $checkout = PagSeguro::checkout()->createFromArray($data);
        $credentials = PagSeguro::credentials()->get();
        $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information

        return $information->getLink();
    }
}
