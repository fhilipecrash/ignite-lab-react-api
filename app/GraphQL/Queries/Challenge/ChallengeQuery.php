<?php

namespace App\GraphQL\Queries\Challenge;

use App\Models\Challenge;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ChallengeQuery extends Query
{
    // Usado na configuração da query (?)
    protected $attributes = [
        'name' => 'challenge',
    ];

    // Define o tipo de retorno da query
    public function type(): Type
    {
        return GraphQL::type('Challenge');
    }

    // A função args é usada para declarar quais argumentos essa query aceitará. No nosso caso só precisamos do id da quest.
    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    // A função resolve faz a maior parte do trabalho, ela retorna o objeto real usando eloquent.
    public function resolve($root, $args)
    {
        return Challenge::findOrFail($args['id']);
    }
}
