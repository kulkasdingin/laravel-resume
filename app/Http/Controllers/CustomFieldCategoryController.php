<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ApiInvalidRequestData;
use App\CustomFieldCategory;

class CustomFieldCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customFieldCategories = CustomFieldCategory::withoutTrashed()->get();
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

        $customFieldCategory = CustomFieldCategory::create($data);

        return response()->json([
            'customFieldCategory'=>$customFieldCategory,
            'status'=>"New custom field category has been created successfully",
        ]);
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
}
