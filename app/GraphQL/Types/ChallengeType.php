<?php

namespace App\GraphQL\Types;

use App\Models\Challenge;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

// Definição do tipo Challenge(da mesma forma que é definido uma string, um int etc)
class ChallengeType extends GraphQLType
{
    // Esta é a sua configuração de tipo. Ele contém informações básicas sobre seu tipo e a qual modelo ele se associa.
    protected $attributes = [
        'name' => 'Challenge',
        'description' => 'A definir',
        'model' => Challenge::class
    ];

    // Este método retorna os campos que seu cliente pode solicitar.
    // Type::listOf(GraphQL::type('Quest')) um tipo num relacionamento um pra muitos
    public function fields(): array
    {
        return [
            'url' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Challenge URL'
            ]
        ];
    }
}