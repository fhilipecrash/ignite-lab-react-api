<?php

namespace App\GraphQL\Mutations\Subscriber;

use App\Models\Subscriber;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteSubscriberMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteSubscriber',
        'description' => 'Delete a subscriber'
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
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $subscriber = Subscriber::findOrFail($args['id']);

        return  $subscriber->delete() ? true : false;
    }
}
