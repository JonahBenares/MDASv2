<?php

namespace App\Http\Controllers;

use App\Models\PowerPlant;
use App\Models\Grid;
use App\Models\Region;
use App\Models\PowerplantType;
use App\Models\PowerplantSub;
use App\Models\PowerplantResource;
use Illuminate\Http\Request;

class PowerPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grid=Grid::all();
        $powerplant=PowerPlant::where('status','Active')->orderBy('short_name')->get();
        return view('power_plant.index',compact('grid','powerplant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
            'connection_type'=> $request->connection_type,
            'actual_units'=> $request->actual_units,
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

    public function editResource($id,$count)
    {
        $resource=PowerPlantResource::where('powerplant_id',$id)->get();
        return view('power_plant.edit_resource', compact('id','count','resource'));
    }


    public function insertResource(Request $request)
    {
        foreach ($request->resource_id as $key => $value) {
            $res=PowerplantResource::create([
                'powerplant_id'=> $request->id,
                'resource_id'=> $request->resource_id[$key],
                'date_commissioned'=> $request->date_commissioned[$key],
                'hex'=> $request->legend[$key]
            ]);
        }
        if($res){
            return redirect()->route('powerplant.index')->with('success',"Powerplant Added Successfully");
        }else{
            return redirect()->route('powerplant.index')->with('fail',"Error! Try Again!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $powerplant=PowerPlant::find($id);
        $grid=Grid::all();
        $region=Region::all();
        $powerplant_type=PowerplantType::all()->sortBy('type_name');
        $powerplant_subtype=PowerplantSub::all()->sortBy('subtype_name');
        return view('power_plant.edit', compact('powerplant','grid','powerplant_type','powerplant_subtype','region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $powerplant = PowerPlant::find($id);
        $powerplant->update([
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
            'connection_type'=> $request->connection_type,
            'actual_units'=> $request->actual_units,
            'status'=> $request->status
        ]);
        if($powerplant){
            return redirect()->route('editResource',['id'=>$id,'count'=>$request->number_of_units]);
        }else{
            return redirect()->route('editResource',['id'=>$id,'count'=>$request->number_of_units]);
        }
    }

    public function updateResource(Request $request)
    {
        $x=0;
        foreach ($request->resource_id as $key => $value) {
            $resource_disp = PowerPlantResource::where('powerplant_id',$request->id)->get();
            $resource_id=(!empty($resource_disp[$x]['id'])) ? $resource_disp[$x]['id'] : '0';
            $count=PowerPlantResource::where('id',$resource_id)->count();
            if($count!=0){
                $resource = PowerPlantResource::find($resource_id);
                $resource->update([
                    'resource_id'=> $request->resource_id[$key],
                    'date_commissioned'=> $request->date_commissioned[$key],
                    'hex'=> $request->legend[$key]
                ]);
            }else{
                $resource=PowerplantResource::create([
                    'powerplant_id'=> $request->id,
                    'resource_id'=> $request->resource_id[$key],
                    'date_commissioned'=> $request->date_commissioned[$key],
                    'hex'=> $request->legend[$key]
                ]);
            }
            $x++;
        }
        if($resource){
            return redirect()->route('powerplant.index')->with('success',"Powerplant Updated Successfully");
        }else{
            return redirect()->route('powerplant.index')->with('fail',"Error! Try Again!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $res=PowerPlantResource::where('powerplant_id',$id)->delete();
        if($res){
            PowerPlant::find($id)->delete();
            return redirect()->route('powerplant.index')->with('success',"Powerplant Deleted Successfully");
        }else{
            return redirect()->route('powerplant.index')->with('fail',"Error! Try Again!");
        }
    }
}
