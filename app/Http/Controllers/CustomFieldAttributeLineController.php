<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ApiInvalidRequestData;
use App\CustomFieldAttributeLine;

class CustomFieldAttributeLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customFieldAttributeLines = CustomFieldAttributeLine::withoutTrashed()->get();
        return response()->json([
            'customFieldAttributeLines'=> $customFieldAttributeLines,
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

        $customFieldAttributeLine = customFieldAttributeLine::create($data);

        return response()->json([
            'customFieldAttributeLine'=>$customFieldAttributeLine,
            'status'=>"New custom field attribute line has been created successfully",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CustomFieldAttributeLine $customFieldAttributeLine)
    {
        return response()->json([
            'customFieldAttributeLine'=> $customFieldAttributeLine,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomFieldAttributeLine $customFieldAttributeLine)
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
    public function update(Request $request, CustomFieldAttributeLine $customFieldAttributeLine)
    {
        $data = $this->validateRequest($request);

        $customFieldAttributeLine->update($data);

        return response()->json([
            'customFieldAttributeLine'=>$customFieldAttributeLine,
            'status'=>"Custom field attribute line has been updated successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(customFieldAttributeLine $customFieldAttributeLine)
    {
        $customFieldAttributeLine->delete();

        return response()->json([
            'customFieldAttributeLine'=>$customFieldAttributeLine,
            'status'=>"Custom field attribute line has been deleted successfully",
        ]);
    }

    public function validateRequest($request, $thisModel = null){
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'order'=>'required',
            'is_active'=>'required',
            'custom_field_category_id'=>'required'
        ]);

        if ($validator->fails()){
            throw(new ApiInvalidRequestData($validator->errors()));
        }

        return $validator->validated();
    }
}
