<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminitrasionController extends Controller
{
    public function index(){
        return view('dashboard.finance.pages.home');
    }






    public function teacher(){
        return view('dashboard.finance.pages.teacher.index');
    }

    public function createTeacher(){
        return view('dashboard.finance.pages.teacher.create');
    }

    public function editTeacher(){
        return view('dashboard.finance.pages.teacher.edit');
    }

    public function editPassTeacher(){
        return view('dashboard.finance.pages.teacher.changePassword');
    }











    public function salaryTeacher(){
        return view('dashboard.finance.pages.salaryTeacher.index');
    }

    public function createsalaryTeacher(){
        return view('dashboard.finance.pages.salaryTeacher.create');
    }
    public function editsalaryTeacher(){
        return view('dashboard.finance.pages.salaryTeacher.show');
    }






    public function mentor(){
        return view('dashboard.finance.pages.mentor.index');
    }

    public function createMentor(){
        return view('dashboard.finance.pages.mentor.create');
    }

    public function editMentor(){
        return view('dashboard.finance.pages.mentor.edit');
    }

    public function editPassMentor(){
        return view('dashboard.finance.pages.mentor.changePassword');
    }






    public function salaryMentor(){
        return view('dashboard.finance.pages.salaryMentor.index');
    }
    public function createsalaryMentor(){
        return view('dashboard.finance.pages.salaryMentor.create');
    }
    public function editsalaryMentor(){
        return view('dashboard.finance.pages.salaryMentor.show');
    }
}
