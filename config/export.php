<?php

return [

    'headers' => ['Content-Type' => 'text/csv'],
    'coursesFileName' => env('EXPORT_COURSES_FILE_NAME', 'CoursesInformation'),
    'studentsFileName' => env('EXPORT_STUDENTS_FILE_NAME', 'StudentsInformation'),

];
