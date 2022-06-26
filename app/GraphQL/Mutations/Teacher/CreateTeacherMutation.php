<?php

namespace App\GraphQL\Mutations\Teacher;

use App\Models\Teacher;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateTeacherMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createTeacher',
        'description' => 'Creates a teacher'
    ];

    public function type(): Type
    {
        return GraphQL::type('Teacher');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'bio' => [
                'name' => 'bio',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'avatar_url' => [
                'name' => 'reward',
                'type' => Type::nonNull(Type::int()),
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
        $teacher = new Teacher();
        $teacher->fill($args);
        $teacher->save();

        return $teacher;
    }
}
