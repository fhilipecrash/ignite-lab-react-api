<?php

namespace App\GraphQL\Mutations\Teacher;

use App\Models\Teacher;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteTeacherMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteTeacher',
        'description' => 'deletes a teacher'
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
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $teacher = Teacher::findOrFail($args['id']);

        return  $teacher->delete() ? true : false;
    }
}
