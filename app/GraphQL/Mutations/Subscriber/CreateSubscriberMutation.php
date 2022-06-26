<?php

namespace App\GraphQL\Mutations\Subscriber;

use App\Models\Subscriber;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateSubscriberMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createSubscriber',
        'description' => 'Creates a subscriber'
    ];

    public function type(): Type
    {
        return GraphQL::type('Subscriber');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'email' => [
                'name' => 'email',
                'type' =>  Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $subscriber = new Subscriber();
        $subscriber->fill($args);
        $subscriber->save();

        return $subscriber;
    }
}
