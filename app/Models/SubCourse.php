<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCourse extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'subcourses';
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function courses(){

        return $this->belongsTo(Course::class, 'fk_courses_id');
    }

}
