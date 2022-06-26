<?php

namespace App\GraphQL\Mutations\Lesson;

use App\Models\Lesson;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteLessonMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteLesson',
        'description' => 'deletes a lesson'
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
        $lesson = Lesson::findOrFail($args['id']);

        return  $lesson->delete() ? true : false;
    }
}
