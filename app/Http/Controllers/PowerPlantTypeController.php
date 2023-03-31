<?php

namespace App\Http\Controllers;

use App\Models\PowerPlantType;
use App\Models\PowerPlantSub;
use Illuminate\Http\Request;

class PowerPlantTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $subtype=array();
        $legend='';
        $powerplanttype='';
        if(isset($_GET['id'])){
            $legend=PowerPlantType::where('id',$_GET['id'])->value('legend');
            $powerplanttype=PowerPlantType::where('id',$_GET['id'])->value('type_name');
            $subtype=PowerPlantSub::where('type_id',$_GET['id'])->get();
        }
        $powerplant_type=PowerPlantType::all()->sortBy('type_name');
        return view('powerplant_type.index',compact('powerplant_type','subtype','powerplanttype','legend'));
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
        $input=$request->all();
        $res=PowerPlantType::create($input);
        if($res){
            return redirect()->route('powerplanttype.index')->with('success',"Powerplant Type Added Successfully!");
        }else{
            return redirect()->route('powerplanttype.index')->with('fail',"Error! Try Again!");
        }
    }

    public function insertSub(Request $request)
    {
        $input=$request->all();
        $res=PowerPlantSub::create($input);
        if($res){
            return redirect()->route('powerplanttype.index',['id'=>$request->type_id])->with('success',"Powerplant Subtype Added Successfully!");
        }else{
            return redirect()->route('powerplanttype.index',['id'=>$request->type_id])->with('fail',"Error! Try Again!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('powerplanttype.index',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PowerPlantType $powerPlantType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $powerplanttype = PowerPlantType::find($request->id);
        // $input = $request->all();
        // $powerplanttype->update($input);
        $powerplanttype = PowerPlantType::find($request->id);
        $powerplanttype->update(
            [
                'type_name' => $request->type_name,
                'legend' => $request->legend,
            ]
        );
        return redirect()->route('powerplanttype.index',['id'=>$request->id])->with('success',"Powerplant Type Updated Successfully");
    }

    public function updateSub(Request $request)
    {
        $powerplantsub = PowerPlantSub::find($request->subid);
        $powerplantsub->update(
            [
                'subtype_name' => $request->subtype_name,
            ]
        );
        return redirect()->route('powerplanttype.index',['id'=>$request->type_id])->with('success',"Powerplant Subtype Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,$type_id)
    {
        PowerPlantSub::find($id)->delete();
        return redirect()->route('powerplanttype.index',['id'=>$type_id])->with('success',"Powerplant Subtype Deleted Successfully");
    }

    public function destroyType($id)
    {
        $res=PowerPlantSub::where('type_id',$id)->delete();
        if($res){
            PowerPlantType::find($id)->delete();
            return redirect()->route('powerplanttype.index',['id'=>$id])->with('success',"Powerplant Type Deleted Successfully");
        }else{
            return redirect()->route('powerplanttype.index',['id'=>$id])->with('fail',"Error! Try Again!");
        }
    }
}
