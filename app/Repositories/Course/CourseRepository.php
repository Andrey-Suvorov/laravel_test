<?php
namespace App\Repositories\Course;

use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseRepository
{
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function getExportQuery($ids)
    {
        $query = $this->course->join('students', 'students.course_id', '=', 'courses.id')->select(
            'courses.course_name as course',
            'courses.university',
            DB::raw('COUNT(students.id) as students_count')
        )->groupBy('students.course_id');

        if (count($ids) > 0) {
            $query->whereIn('courses.id', $ids);
        }

        return $query;
    }
}