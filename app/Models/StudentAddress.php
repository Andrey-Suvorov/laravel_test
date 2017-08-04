<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAddress extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student_addresses';

    public $timestamps = false;

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
