<?php

namespace App\GraphQL\Mutations\Lesson;

use App\Models\Lesson;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateLessonMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createLesson',
        'description' => 'Creates a lesson'
    ];

    public function type(): Type
    {
        return GraphQL::type('Lesson');
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'slug' => [
                'name' => 'slug',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::string()),
            ],
            'avaliable_at' => [
                'name' => 'avaliable_at',
                'type' => Type::nonNull(Type::string()),
            ],
            'video_id' => [
                'name' => 'video_id',
                'type' => Type::nonNull(Type::string()),
            ],
            'challenge_id' => [
                'name' => 'challenge_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:challenge,id']
            ],
            'teacher_id' => [
                'name' => 'teacher_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:teacher,id']
            ],
            'lesson_type' => [
                'name' => 'lesson_type',
                'type' => Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $lesson = new Lesson();
        $lesson->fill($args);
        $lesson->save();

        return $lesson;
    }
}
