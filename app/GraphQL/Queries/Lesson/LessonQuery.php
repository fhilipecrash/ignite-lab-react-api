<?php

namespace App\GraphQL\Queries\Lesson;

use App\Models\Lesson;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class LessonQuery extends Query
{
    protected $attributes = [
        'name' => 'lesson',
    ];

    public function type(): Type
    {
        return GraphQL::type('Lesson');
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
        return Lesson::findOrFail($args['id']);
    }
}
