<?php
namespace App\Repositories\Student;


use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentRepository
{

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function getExportQuery($ids)
    {
        $query = $this->student->join('courses', 'courses.id', '=', 'students.course_id')
            ->join('student_addresses as address', 'address.id', '=', 'students.address_id')
            ->select(
                'students.firstname',
                'students.surname',
                'students.email',
                'students.nationality',
                'courses.university',
                'courses.course_name as course',
                DB::raw('CONCAT(
                    address.houseNo,  
                    ", ", 
                    address.line_1,  
                    ", ", 
                    address.line_2, 
                    ", ",  
                    address.postcode,  
                    ", ", 
                    address.city) 
                    as address'
                )
            );

        if (count($ids) > 0) {
            $query->whereIn('students.id', $ids);
        }

        return $query;
    }
}