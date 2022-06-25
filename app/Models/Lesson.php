<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'available_at', 'video_id', 'challenge_id', 'teacher_id', 'lesson_type'];

    public function challenge() {
        return $this->hasOne(Challenge::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
