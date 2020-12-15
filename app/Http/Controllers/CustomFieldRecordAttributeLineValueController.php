<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ApiInvalidRequestData;
use App\CustomFieldRecordAttributeLineValue;

class CustomFieldRecordAttributeLineValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customFieldRecordAttributeLineValues = CustomFieldRecordAttributeLineValue::withoutTrashed()
                ->get();
        
        return response()->json([
            'customFieldRecordAttributeLineValues'=> $customFieldRecordAttributeLineValues,
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

        $customFieldRecordAttributeLineValue = CustomFieldRecordAttributeLineValue::create($data);

        return response()->json([
            'customFieldRecordAttributeLineValue'=>$customFieldRecordAttributeLineValue,
            'status'=>"New custom field record attribute line value has been created successfully",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CustomFieldRecordAttributeLineValue $customFieldRecordAttributeLineValue)
    {
        return response()->json([
            'customFieldRecordAttributeLineValue'=> $customFieldRecordAttributeLineValue,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomFieldRecordAttributeLineValue $customFieldRecordAttributeLineValue)
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
    public function update(Request $request, CustomFieldRecordAttributeLineValue $customFieldRecordAttributeLineValue)
    {
        $data = $this->validateRequest($request);

        $customFieldRecordAttributeLineValue->update($data);

        return response()->json([
            'CustomFieldRecordAttributeLineValue'=>$customFieldRecordAttributeLineValue,
            'status'=>"Custom field record attribute line value has been updated successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomFieldRecordAttributeLineValue $customFieldRecordAttributeLineValue)
    {
        $customFieldRecordAttributeLineValue->delete();

        return response()->json([
            'CustomFieldRecordAttributeLineValue'=>$customFieldRecordAttributeLineValue,
            'status'=>"Custom field record attribute line value has been deleted successfully",
        ]);
    }

    public function validateRequest($request, $thisModel = null){
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'order'=>'required',
            'is_active'=>'required',
            'cv_id'=>'required'
        ]);

        if ($validator->fails()){
            throw(new ApiInvalidRequestData($validator->errors()));
        }

        return $validator->validated();
    }
}
