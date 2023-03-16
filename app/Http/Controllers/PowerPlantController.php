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
        // $input=$request->all();
        // $res=PowerPlant::create($input);
        $res=PowerPlant::insertGetId([
            'facility_name'=> $request->facility_name,
            'pp_type_id'=> $request->pp_type_id,
            'subtype_id'=> $request->subtype_id,
            'operator'=> $request->operator,
            'short_name'=> $request->short_name,
            'region_id'=> $request->region_id,
            'region'=> $request->region,
            'municipality'=> $request->municipality,
            'grid_id'=> $request->grid_id,
            'capacity_installed'=> $request->capacity_installed,
            'capacity_dependable'=> $request->capacity_dependable,
            'number_of_units'=> $request->number_of_units,
            'ippa'=> $request->ippa,
            'fit_approved'=> $request->fit_approved,
            'owner_type'=> $request->owner_type,
            'type_of_contract'=> $request->type_of_contract,
            'status'=> $request->status
        ]);
        if($res){
            return redirect()->route('showResource',['id'=>$res,'count'=>$request->number_of_units]);
        }else{
            return redirect()->route('showResource',['id'=>$res,'count'=>$request->number_of_units]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PowerPlant $id,$count)
    {
        return view('power_plant.show', compact('id','count'));
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
