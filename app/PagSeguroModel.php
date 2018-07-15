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
                    'description' => 'IX CONGRESSO PAULISTA DA ABENEPI',
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
                'type' => 2,
                'cost' => 0,
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
                'bornDate' => date("Y-m-d", strtotime($inscrito->nascimento)),
            ]
        ];

        /*$data = [
            'items' => [
                [
                    'id' => '18',
                    'description' => 'Item Um',
                    'quantity' => '1',
                    'amount' => '1.15',
                ],
            ],
            'shipping' => [
                'address' => [
                    'postalCode' => '06410030',
                    'street' => 'Rua Leonardo Arruda',
                    'number' => '12',
                    'district' => 'Jardim dos Camargos',
                    'city' => 'Barueri',
                    'state' => 'SP',
                    'country' => 'BRA',
                ],
                'type' => 2,
                'cost' => 0,
            ],
            'sender' => [
                'email' => 'sender@gmail.com',
                'name' => 'Isaque de Souza Barbosa',
                'documents' => [
                    [
                        'number' => '01234567890',
                        'type' => 'CPF'
                    ]
                ],
                'phone' => '11985445522',
                'bornDate' => '1988-03-21',
            ]
        ];*/

        $checkout = PagSeguro::checkout()->createFromArray($data);
        $credentials = PagSeguro::credentials()->get();
        $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information

        return $information->getLink();
    }
}
