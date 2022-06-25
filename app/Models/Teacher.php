<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bio', 'avatar_url', 'lessons_id'];

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }
}
