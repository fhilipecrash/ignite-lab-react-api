<?php

namespace App\GraphQL\Mutations\Challenge;

use App\Models\Challenge;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteChallengeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteChallenge',
        'description' => 'Deletes a challenge'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

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

    public function resolve($root, $args)
    {
        // Checa o id da entrada que deseja apagar
        $challenge = Challenge::findOrFail($args['id']);

        return  $challenge->delete() ? true : false;
    }
}
