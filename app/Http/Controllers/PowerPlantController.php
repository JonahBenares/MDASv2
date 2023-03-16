<?php

namespace App\Http\Controllers;

use App\Models\PowerPlant;
use App\Models\Grid;
use App\Models\Region;
use App\Models\PowerplantType;
use App\Models\PowerplantSub;
use Illuminate\Http\Request;

class PowerPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grid=Grid::all();
        $powerplant=PowerPlant::all()->sortBy('short_name');
        return view('power_plant.index',compact('grid','powerplant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grid=Grid::all();
        $grid=Grid::all();
        $powerplant_type=PowerplantType::all()->sortBy('type_name');
        return view('power_plant.create',compact('grid','powerplant_type'));
    }

    public function fetchSub(Request $request)
    {
        $data['subtype'] = PowerplantSub::where("type_id", $request->type_id)->get(["subtype_name", "id"]);
        return response()->json($data);
    }

    public function fetchRegion(Request $request)
    {
        $data['region'] = Region::where("grid_id", $request->grid_id)->get(["region_name", "id"]);
        return response()->json($data);
    }

    public function fetchRegionid(Request $request)
    {
        $region_code = Region::find($request->region_id);
        return response()->json($region_code);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $res=PowerPlant::create($input);
        $lastInsertID = $res->id;
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
