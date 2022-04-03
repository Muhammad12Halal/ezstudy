<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';

    protected $fillable = ['name', 'slug'];

    public function CourseContent()
    {
        return $this->hasMany('App\Models\Course', 'level_id', 'id');
    }
}
