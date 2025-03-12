<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    function getAllStudentDetails() {
        $dummyFunctiontxt = new Student();
        echo $dummyFunctiontxt -> dummy();
        echo '<br>';
        $students = Student::all();
        return view('student', ['students' => $students]);
    }

    function getAllStudentsByQueryBuilder() {
        $students = DB::table('students') -> get();
        return $students;
    }

    function getStudentOfClassByClass($class) {
        $students = DB::table('students') -> where('class', $class) -> get();
        //return $students;
        // we can also return response in more proper way as below
        return response() -> json($students);
    }
}
