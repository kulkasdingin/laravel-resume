<?php

namespace App\Http\Controllers\Admin;

use App\Cv;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    // public function submit(Request $request)
    // {
    //     $request->validate([
    //         'photo' => 'file|image',
    //         'first_name' => 'required|filled|string',
    //         'last_name' => 'required|filled|string',
    //         'profession' => 'required|string',
    //         'address' => 'string',
    //         'email' => 'email',
    //         'birth_date' => 'date',
    //         'phone' => 'integer',
    //         'gender' => 'string',
    //         'password' => 'string',
    //         'is_protected' => 'required|integer|max:1|min:0',
    //         'profile_id' => 'required|integer|exist:App\Profile,id',
    //     ]);

    //     $request->file("photo")->store('photo');

    //     $contents = file_get_contents($request->photo->path());

    // }
}
