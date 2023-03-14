<?php

namespace App\Http\Controllers;

use App\Models\Grid;
use Illuminate\Http\Request;

class GridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grid=Grid::all()->sortBy('grid_name');
        return view('mf_grid.index',compact('grid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mf_grid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $res=Grid::create($input);
        if($res){
            return redirect()->route('grid.create')->with('success',"Grid Added Successfully");
        }else{
            return redirect()->route('grid.create')->with('fail',"Error! Try Again!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Grid $grid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $grid=Grid::find($id);
        return view('mf_grid.edit', compact('grid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $grid = Grid::find($id);
        $input = $request->all();
        $grid->update($input);
        return redirect()->route('grid.edit',$id)->with('success',"Grid Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grid $grid)
    {
        //
    }
}
