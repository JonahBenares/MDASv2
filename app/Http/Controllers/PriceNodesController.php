<?php

namespace App\Http\Controllers;

use App\Models\PriceNodes;
use Illuminate\Http\Request;

class PriceNodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $price_nodes=PriceNodes::all()->sortBy('description');
        return view('mf_pricenodes.index',compact('price_nodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mf_pricenodes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $res=PriceNodes::create($input);
        if($res){
            return redirect()->route('pricenodes.create')->with('success',"Price Node Added Successfully");
        }else{
            return redirect()->route('pricenodes.create')->with('fail',"Error! Try Again!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PriceNodes $priceNodes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $price_nodes=PriceNodes::find($id);
        return view('mf_pricenodes.edit', compact('price_nodes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pricenodes = PriceNodes::find($id);
        $input = $request->all();
        $pricenodes->update($input);
        return redirect()->route('pricenodes.edit',$id)->with('success',"Price Node Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PriceNodes $priceNodes)
    {
        //
    }
}
