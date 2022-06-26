<?php

namespace App\GraphQL\Mutations\Challenge;

use App\Models\Challenge;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateChallengeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateChallenge',
        'description' => 'Updates a challenge'
    ];

    public function type(): Type
    {
        return GraphQL::type('Challenge');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'url' => [
                'name' => 'url',
                'type' =>  Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $challenge = Challenge::findOrFail($args['id']);
        $challenge->fill($args);
        $challenge->save();

        return $challenge;
    }
}
