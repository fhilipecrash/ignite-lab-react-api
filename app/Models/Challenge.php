<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    // Deixa o 'title' editável e define o relacionamento um pra muitos
    protected $fillable = ['url']; // Colocar nesse array qualquer valor que eu deseje ser editável

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
}
