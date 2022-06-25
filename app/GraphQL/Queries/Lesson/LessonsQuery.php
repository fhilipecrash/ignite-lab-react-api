<?php

namespace App\GraphQL\Queries\Lesson;

use App\Models\Lesson;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class LessonsQuery extends Query
{
    protected $attributes = [
        'name' => 'lessons',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Lesson'));
    }

    public function resolve($root, $args)
    {
        return Lesson::all();
    }
}
