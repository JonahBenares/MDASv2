<?php

namespace App\Http\Controllers;

use App\Models\PowerPlant;
use App\Models\Grid;
use App\Models\PowerplantType;
use Illuminate\Http\Request;

class PowerPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grid=Grid::all();
        $powerplant_type=PowerplantType::all();
        return view('power_plant.index',compact('grid','powerplant_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grid=Grid::all();
        $powerplant_type=PowerplantType::all();
        return view('power_plant.create',compact('grid','powerplant_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $res=PowerPlant::create($input);
        if($res){
            return redirect()->route('powerplant.create')->with('success',"Power Plant Added Successfully!");
        }else{
            return redirect()->route('powerplant.create')->with('fail',"Error! Try Again!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PowerPlant $powerPlant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PowerPlant $id)
    {
        return view('power_plant.edit', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PowerPlant $powerPlant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PowerPlant $powerPlant)
    {
        //
    }
}
