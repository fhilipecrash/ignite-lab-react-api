<?php

namespace App\GraphQL\Queries\Teacher;

use App\Models\Teacher;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class TeacherQuery extends Query
{
    protected $attributes = [
        'name' => 'teacher',
    ];

    public function type(): Type
    {
        return GraphQL::type('Teacher');
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
        return Teacher::findOrFail($args['id']);
    }
}
