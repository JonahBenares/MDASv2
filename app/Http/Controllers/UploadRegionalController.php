<?php

namespace App\Http\Controllers;

use App\Models\UploadRegional;
use Illuminate\Http\Request;

class UploadRegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('upload_regional.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(UploadRegional $id)
    {
        return view('upload_regional.show',$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadRegional $uploadRegional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UploadRegional $uploadRegional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadRegional $uploadRegional)
    {
        //
    }
}
