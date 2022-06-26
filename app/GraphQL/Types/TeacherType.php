<?php

namespace App\GraphQL\Types;

use App\Models\Teacher;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TeacherType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Teacher',
        'description' => 'Collection of categories',
        'model' => Teacher::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of teacher'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Teacher name'
            ],
            'bio' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Teacher bio'
            ],
            'avatar_url' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Avatar URL'
            ],
            'lesson_id' => [
                'type' => Type::listOf(GraphQL::type('Lesson')),
                'description' => 'Lesson ID'
            ]
        ];
    }
}