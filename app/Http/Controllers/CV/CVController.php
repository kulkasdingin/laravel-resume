<?php

namespace App\Http\Controllers\CV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CVController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function templates_plain()
    {
        return view('cv.templates-plain');
    }

    public function templates_first()
    {
        return view('cv.templates-first');
    }

    public function templates_second()
    {
        return view('cv.templates-second');
    }

    public function templates_demo()
    {
        return view('cv.templates-demo');
    }

    // public function listCV()
    // {
    //     return view('cv.index');
    // }

    // public function listCVProfile()
    // {
    //     return view("cv.indexProfile");
    // }
}
