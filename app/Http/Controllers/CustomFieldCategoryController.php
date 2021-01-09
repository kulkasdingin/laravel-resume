<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ApiInvalidRequestData;
use App\CustomFieldCategory;
use App\CustomFieldAttributeLine;
use App\CustomFieldRecord;
use App\CustomFieldRecordAttributeLineValue;


class CustomFieldCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customFieldCategories = CustomFieldCategory::withoutTrashed()->with([
            'customFieldAttributeLines', 
            'customFieldRecords',
            'customFieldRecords.customFieldRecordAttributeLineValues'
        ])->get();
        return response()->json([
            'customFieldCategories'=> $customFieldCategories,
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

        // $customFieldCategory = CustomFieldCategory::create($data);

        $customFieldAttributeLinesData = json_decode($request['customFieldAttributeLines']);
        $customFieldRecordsData = json_decode($request['customFieldRecords']);

        $customFieldAttributeLines = [];

        // To do: Looping attribute lines
        foreach($customFieldAttributeLinesData as $attrLine) {
            // $attrLine->custom_field_category_id = $customFieldCategory['id'];
            $attrLine->custom_field_category_id = 1;
            // $validatedAttrLine = $this->validateAttrLineRequest($attrLine);
            $validatedAttrLine = $attrLine;
            // $newAttrLine = CustomFieldAttributeLine::create($validatedAttrLine);
            array_push($customFieldAttributeLines, $validatedAttrLine);
        }

        $customFieldRecords = [];
        
        // To do: Looping records
        foreach($customFieldRecordsData as $record) {

            // Step 1: Assign row
            // $record->custom_field_category_id = $customFieldCategory['id'];
            $record->custom_field_category_id = 1;
            // $validatedRecord = $this->validateRecordRequest($record);
            $validatedRecord = $record; 
            // $newAttrLine = CustomFieldAttributeLine::create($validatedAttrLine);
            array_push($customFieldRecords, $validatedRecord);

            // Step 2: Assign values (use second foreach) [TO DO]
        }

        return response()->json([
            'customFieldAttributeLines'=>$customFieldAttributeLines,
            'customFieldRecords'=>$customFieldRecords
        ]);

        // return response()->json([
        //     'customFieldCategory'=>$customFieldCategory,
        //     'status'=>"New custom field category has been created successfully",
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CustomFieldCategory $customFieldCategory)
    {
        return response()->json([
            'customFieldCategory'=> $customFieldCategory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomFieldCategory $customFieldCategory)
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
    public function update(Request $request, CustomFieldCategory $customFieldCategory)
    {
        $data = $this->validateRequest($request);

        $customFieldCategory->update($data);

        return response()->json([
            'customFieldCategory'=>$customFieldCategory,
            'status'=>"Custom field category has been updated successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomFieldCategory $customFieldCategory)
    {
        $customFieldCategory->delete();

        return response()->json([
            'customFieldCategory'=>$customFieldCategory,
            'status'=>"Custom field category has been deleted successfully",
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

    // Validate Attr Line
    public function validateAttrLineRequest($request, $thisModel = null){
        $validator = Validator::make($request, [
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

    // Validate Record
    public function validateRecordRequest($request, $thisModel = null){
        $validator = Validator::make($request, [
            'order'=>'required',
            'custom_field_category_id'=>'required'
        ]);

        if ($validator->fails()){
            throw(new ApiInvalidRequestData($validator->errors()));
        }

        return $validator->validated();
    }
}
