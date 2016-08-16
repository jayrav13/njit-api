<?php

namespace App\Libraries;

use DB;
use App\Models\Semester;
use App\Models\Subject;

class CoursesLibrary {

    public static function getCourses()
    {
        DB::transaction(function() {
            
            $semesters = Semester::all();
            Subject::truncate();

            foreach($semesters as $semester)
            {
                $subjects = [];
                exec('python storage/scripts/courses/subjects.py ' . $semester->permalink, $subjects);

                foreach($subjects as $subject)
                {

                    $subject = json_decode($subject, true);

                    try
                    {
                        $semester->subjects()->create($subject);
                    }
                    catch (Exception $e)
                    {

                    }
                }
            }
        });
    }
}