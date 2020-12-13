<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ApiInvalidRequestData;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::withoutTrashed()->with('cvs')->get();
        return response()->json([
            'profiles'=> $profiles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest($request);

        if ($request->file('photo')) {
            $photo = $request->file('photo')->store('uploads/profile/photo','public');

            $data['photo'] = $photo;
        } else {
            unset($data['photo']);
        }

        $profile = Profile::create($data);

        return response()->json([
            'profile'=>$profile,
            'status'=>"New profile has been created successfully",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return response()->json([
            'profile'=> $profile,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $data = $this->validateRequest($request);

        // Todo if fotonya didelete
        if ($request->file('photo')) {
            $photo = $request->file('photo')->store('uploads/profile/photo','public');

            $data['photo'] = $photo;
        } else {
            unset($data['photo']);
        }

        $profile->update($data);

        return response()->json([
            'profile'=>$profile,
            'status'=>"Profile has been updated successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return response()->json([
            'profile'=>$profile,
            'status'=>"Profile has been deleted successfully",
        ]);
    }

    public function validateRequest($request, $thisModel = null){
        $validator = Validator::make($request->all(), [
            'first_name'=>'required',
            'last_name'=>'required',
            'profession'=>'required',
            'photo'=>'nullable|image|mimes:jpeg,jpg,bmp,png|max:2000',
            'address'=>'nullable',
            'email'=>'nullable',
            'birth_date'=>'nullable',
            'phone'=>'nullable',
            'gender'=>'nullable',
            'user_id'=>'required'
        ]);

        if ($validator->fails()){
            throw(new ApiInvalidRequestData($validator->errors()));
        }

        return $validator->validated();
    }
}
