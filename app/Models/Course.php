<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'user_id',
        'category_id',
        'level_id',
        'title',
        'slug',
        'description',
        'image',
        'video',
        'price',
        'duration',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level', 'level_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\CourseRating', 'course_id', 'id');
    }

    public function contents()
    {
        return $this->hasMany('App\Models\CourseContent', 'course_id', 'id');
    }

    public function enrolls()
    {
        return $this->hasMany('App\Models\CourseEnroll', 'course_id', 'id');
    }
}
