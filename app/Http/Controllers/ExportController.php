<?php

namespace App\Http\Controllers;

use App\Components\Export\Export;
use App\Models\Course;
use App\Models\Student;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Student\StudentRepository;
use League\Flysystem\Config;

class ExportController extends Controller
{
    public function __construct()
    {

    }

    public function welcome()
    {
        return view('hello');
    }

    /**
     * View all students found in the database
     */
    public function viewStudents()
    {
        $students = Student::with('course')->get();
        return view('view_students', compact(['students']));
    }

    public function viewCourses()
    {
        $courses = Course::with('students')->get()->sortBy(function($course) {
            return $course->students->count();
        }, 1,1);
        return view('view_courses', compact(['courses']));
    }

    /**
     * Exports all student data to a CSV file
     */
    public function exportStudents()
    {
        $type = 'csv';
        $students = request('students');

        if (empty($students)) {
            return back()->withErrors([
                'message' => 'Please check students to export some information.'
            ]);
        }

        $studentsRepo = new StudentRepository(new Student());
        $studentsQuery = $studentsRepo->getExportQuery($students);

        $exporter = new Export($type);

        $filePath =  $exporter->export($studentsQuery->get()->toArray());

        return response()
            ->download($filePath,  config('export.studentsFileName') .'.'. $type, config('export.headers'));

    }

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */
    public function exportCourseAttendence()
    {
        $type = 'csv';
        $courses = request('courses');

        if (empty($courses)) {
            return back()->withErrors([
                'message' => 'Please check courses to export some information.'
            ]);
        }

        $courseRepo = new CourseRepository(new Course());
        $courseQuery = $courseRepo->getExportQuery($courses);

        $exporter = new Export($type);

        $filePath =  $exporter->export($courseQuery->get()->toArray());

        return response()
            ->download($filePath,  config('export.coursesFileName') .'.'. $type, config('export.headers'));
    }
}
