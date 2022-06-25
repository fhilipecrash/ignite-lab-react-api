<?php

namespace App\GraphQL\Queries\Teacher;

use App\Models\Teacher;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class TeachersQuery extends Query
{
    protected $attributes = [
        'name' => 'teachers',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Teacher'));
    }

    public function resolve($root, $args)
    {
        return Teacher::all();
    }
}
