<?php

namespace App\GraphQL\Queries\Subscriber;

use App\Models\Subscriber;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class SubscriberQuery extends Query
{
    protected $attributes = [
        'name' => 'subscriber',
    ];

    public function type(): Type
    {
        return GraphQL::type('Subscriber');
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
        return Subscriber::findOrFail($args['id']);
    }
}
