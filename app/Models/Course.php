<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'courses';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];


    public function subcourses()
    {
        return $this->hasMany(SubCourse::class, 'fk_courses_id');
    }
}
