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
        $resource_type=ResourceType::all()->sortBy('resource_name');
        return view('resource_type.index',compact('resource_type'));
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
        $input=$request->all();
        $res=ResourceType::create($input);
        if($res){
            return redirect()->route('resourcetype.create')->with('success',"Resource Type Added Successfully");
        }else{
            return redirect()->route('resourcetype.create')->with('fail',"Error! Try Again!");
        }
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
    public function edit($id)
    {
        $resource_type=ResourceType::find($id);
        return view('resource_type.edit',compact('resource_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resourcetype = ResourceType::find($id);
        $input = $request->all();
        $resourcetype->update($input);
        return redirect()->route('resourcetype.edit',$id)->with('success',"Resource Type Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResourceType $resourceType)
    {
        //
    }
}
