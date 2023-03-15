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
        if(isset($_GET['id'])){
            $subtype=PowerPlantSub::where('type_id',$_GET['id'])->get();
        }
        $powerplant_type=PowerPlantType::all()->sortBy('type_name');
        return view('powerplant_type.index',compact('powerplant_type','subtype'));
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
    public function update(Request $request, PowerPlantType $powerPlantType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PowerPlantType $powerPlantType)
    {
        //
    }
}
