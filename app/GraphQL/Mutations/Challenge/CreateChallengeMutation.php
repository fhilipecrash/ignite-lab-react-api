<?php

namespace App\GraphQL\Mutations\Challenge;

use App\Models\Challenge;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateChallengeMutation extends Mutation
{
    // A função de atributos é usada como configuração de mutação.
    protected $attributes = [
        'name' => 'createChallenge',
        'description' => 'Creates a challenge'
    ];

    // A função type é usada para declarar que tipo de objeto essa consulta retornará.
    public function type(): Type
    {
        return GraphQL::type('Challenge');
    }

    // A função args é usada para declarar quais argumentos essa mutação aceitará. No nosso caso, precisamos apenas do campo de título.
    public function args(): array
    {
        return [
            'url' => [
                'name' => 'url',
                'type' =>  Type::nonNull(Type::string()),
            ],
        ];
    }

    // A função de resolução faz a maior parte do trabalho, ela faz a mutação real usando eloquente.
    public function resolve($root, $args)
    {
        $category = new Challenge();
        $category->fill($args);
        $category->save();

        return $category;
    }
}
