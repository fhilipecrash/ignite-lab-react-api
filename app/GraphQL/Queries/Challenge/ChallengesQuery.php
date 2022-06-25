<?php

namespace App\GraphQL\Queries\Challenge;

use App\Models\Challenge;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ChallengesQuery extends Query
{
    protected $attributes = [
        'name' => 'challenges',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Challenge'));
    }

    public function resolve($root, $args)
    {
        return Challenge::all();
    }
}
