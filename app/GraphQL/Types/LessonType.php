<?php

namespace App\GraphQL\Types;

use App\Models\Lesson;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LessonType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Lesson',
        'description' => 'A definir',
        'model' => Lesson::class
    ];

    public function fields(): array
    {
        return [
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Lesson name'
            ],
            // TODO Adicionar o slug a partir do title
            'slug' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Lesson name URL friendly'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'Lesson description'
            ],
            // TODO Adicionar o tipo Data
            'available_at' => [
                'type' => Type::string(),
                'description' => 'Lesson availble date'
            ],
            'challenge_id' => [
                'type' => Type::listOf(GraphQL::type('Challenge')),
                'description' => 'Challenge ID'
            ],
            'teacher_id' => [
                'type' => Type::listOf(GraphQL::type('Teacher')),
                'description' => 'Teacher ID'
            ],
            // TODO Adicionar o tipo de opção de duas escolhas
            'lesson_type' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Teacher ID'
            ]
        ];
    }
}