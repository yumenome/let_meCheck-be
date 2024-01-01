<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhoneResource;
use App\Http\Resources\PhoneReviewResource;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function find($id){
        $phones = new PhoneResource(Phone::where('brand_id', $id)->get());

        return PhoneResource::collection($phones);
    }
    public function index()
    {
        $phones = new PhoneResource(Phone::all());

        return PhoneResource::collection($phones);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Phone $phone)
    {

        return new PhoneReviewResource($phone);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        //
    }
}
