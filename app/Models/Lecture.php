<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $table = 'lectures';

    protected $fillable = [
        'title',
        'content_id',
        'desc',
        'content',
        'video',
        'image',
        'audio',
        'file',
    ];

    public function contents()
    {
        return $this->belongsTo('App\Models\CourseContent', 'content_id', 'id');
    }
}
