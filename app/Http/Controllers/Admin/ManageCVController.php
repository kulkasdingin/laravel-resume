<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ManageCVController extends Controller
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

    public function create()
    {
        return view('cv.create.profileChoice');
    }

    public function fillIdentity()
    {
        return view('cv.create.identity');
    }

    public function fillExperience()
    {
        return view('cv.create.experience');
    }

    public function fillEducation()
    {
        return view('cv.create.education');
    }

    public function fillSkill()
    {
        return view('cv.create.skill');
    }

    public function fillExtra()
    {
        return view('cv.create.custom');
    }

    public function fillSummary()
    {
        return view('cv.create.summary');
    }
}
