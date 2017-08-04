<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

//    protected $appends = array('student_count');

    public $timestamps = false;

    public function students()
    {
        return $this->hasMany(Student::class);
    }

//    public function getStudentCountAttribute()
//    {
//        return $this->students->count();
//    }

}
