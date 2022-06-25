<?php

namespace App\GraphQL\Mutations\Category;

use App\Models\Category;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateCategoryMutation extends Mutation
{
    // A função de atributos é usada como configuração de mutação.
    protected $attributes = [
        'name' => 'createCategory',
        'description' => 'Creates a category'
    ];

    // A função type é usada para declarar que tipo de objeto essa consulta retornará.
    public function type(): Type
    {
        return GraphQL::type('Category');
    }

    // A função args é usada para declarar quais argumentos essa mutação aceitará. No nosso caso, precisamos apenas do campo de título.
    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
            ],
        ];
    }

    // A função de resolução faz a maior parte do trabalho, ela faz a mutação real usando eloquente.
    public function resolve($root, $args)
    {
        $category = new Category();
        $category->fill($args);
        $category->save();

        return $category;
    }
}
