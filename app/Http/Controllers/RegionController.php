<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Grid;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $region=Region::all()->sortBy('region_name');
        return view('mf_region.index',compact('region'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grid=Grid::all();
        return view('mf_region.create',compact('grid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $res=Region::create($input);
        if($res){
            return redirect()->route('region.create')->with('success',"Region Added Successfully");
        }else{
            return redirect()->route('region.create')->with('fail',"Error! Try Again!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $grid=Grid::all();
        $region=Region::find($id);
        return view('mf_region.edit',compact('grid','region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $region = Region::find($id);
        $input = $request->all();
        $region->update($input);
        return redirect()->route('region.edit',$id)->with('success',"Region Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        //
    }
}
