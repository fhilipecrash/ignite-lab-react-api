<?php

namespace App\GraphQL\Mutations\Teacher;

use App\Models\Teacher;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateTeacherMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateTeacher',
        'description' => 'Updates a teacher'
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
                'type' =>  Type::nonNull(Type::int()),
            ],
            'name' => [
                'name' => 'name',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'bio' => [
                'name' => 'bio',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'avatar_url' => [
                'name' => 'avatar_url',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'lesson_id' => [
                'name' => 'lesson_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:lesson,id']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $teacher = Teacher::findOrFail($args['id']);
        $teacher->fill($args);
        $teacher->save();

        return $teacher;
    }
}
