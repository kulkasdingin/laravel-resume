<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ApiInvalidRequestData;
use App\CustomFieldRecord;

class CustomFieldRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customFieldRecords = CustomFieldRecord::withoutTrashed()
                ->with('customFieldAttributeLineValues')
                // ->with('customFieldAttributeLineValues.customFieldAttributeLine')
                ->get();
        
        return response()->json([
            'customFieldRecords'=> $customFieldRecords,
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

        $customFieldRecord = CustomFieldRecord::create($data);

        return response()->json([
            'customFieldRecord'=>$customFieldRecord,
            'status'=>"New custom field record has been created successfully",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CustomFieldRecord $customFieldRecord)
    {
        return response()->json([
            'customFieldRecord'=> $customFieldRecord,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomFieldRecord $customFieldRecord)
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
    public function update(Request $request, CustomFieldRecord $customFieldRecord)
    {
        $data = $this->validateRequest($request);

        $customFieldRecord->update($data);

        return response()->json([
            'customFieldRecord'=>$customFieldRecord,
            'status'=>"Custom field record has been updated successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomFieldRecord $customFieldRecord)
    {
        $customFieldRecord->delete();

        return response()->json([
            'customFieldRecord'=>$customFieldRecord,
            'status'=>"Custom field record has been deleted successfully",
        ]);
    }

    public function validateRequest($request, $thisModel = null){
        $validator = Validator::make($request->all(), [
            'order'=>'required',
            'custom_field_category_id'=>'required'
        ]);

        if ($validator->fails()){
            throw(new ApiInvalidRequestData($validator->errors()));
        }

        return $validator->validated();
    }
}
