<?php

namespace App\GraphQL\Queries\Subscriber;

use App\Models\Subscriber;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class SubscribersQuery extends Query
{
    protected $attributes = [
        'name' => 'subscribers',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Subscriber'));
    }

    public function resolve($root, $args)
    {
        return Subscriber::all();
    }
}
