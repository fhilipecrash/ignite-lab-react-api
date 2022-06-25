<?php

namespace App\GraphQL\Types;

use App\Models\Subscriber;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SubscriberType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Subscriber',
        'description' => 'A definir',
        'model' => Subscriber::class
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of subscriber'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Email of subscriber'
            ]
        ];
    }
}