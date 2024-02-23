<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminitrasionController extends Controller
{
    public function index(){
        return view('dashboard.keuangan.pages.home');
    }









    public function guru(){
        return view('dashboard.keuangan.pages.guru.index');
    }

    public function createGuru(){
        return view('dashboard.keuangan.pages.guru.create');
    }

    public function editGuru(){
        return view('dashboard.keuangan.pages.guru.edit');
    }

    public function editPassGuru(){
        return view('dashboard.keuangan.pages.guru.changePassword');
    }











    public function gajiGuru(){
        return view('dashboard.keuangan.pages.gajiGuru.index');
    }

    public function createGajiGuru(){
        return view('dashboard.keuangan.pages.gajiGuru.create');
    }






    public function mentor(){
        return view('dashboard.keuangan.pages.mentor.index');
    }

    public function createMentor(){
        return view('dashboard.keuangan.pages.mentor.create');
    }

    public function editMentor(){
        return view('dashboard.keuangan.pages.mentor.edit');
    }

    public function editPassMentor(){
        return view('dashboard.keuangan.pages.mentor.changePassword');
    }






    public function gajiMentor(){
        return view('dashboard.keuangan.pages.gajiMentor.index');
    }
    public function createGajiMentor(){
        return view('dashboard.keuangan.pages.gajiMentor.create');
    }
}
