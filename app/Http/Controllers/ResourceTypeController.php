<?php

namespace App\Http\Controllers;

use App\Models\ResourceType;
use Illuminate\Http\Request;

class ResourceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('resource_type.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resource_type.create');
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
    public function show(ResourceType $resourceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResourceType $id)
    {
        return view('resource_type.edit',$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResourceType $resourceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResourceType $resourceType)
    {
        //
    }
}
