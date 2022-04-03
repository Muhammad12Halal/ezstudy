<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRating extends Model
{
    use HasFactory;

    protected $table = 'course_ratings';

    protected $fillable = [
        'user_id', 'course_id', 'rating', 'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
