<?php

namespace App\GraphQL\Mutations\Subscriber;

use App\Models\Subscriber;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateSubscriberMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateSubscriber',
        'description' => 'Updates a subscriber'
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
                'type' =>  Type::nonNull(Type::int()),
            ],
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
        $subscriber = Subscriber::findOrFail($args['id']);
        $subscriber->fill($args);
        $subscriber->save();

        return $subscriber;
    }
}
