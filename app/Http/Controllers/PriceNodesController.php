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
        return view('mf_pricenodes.index');
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
        //
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
    public function edit(PriceNodes $id)
    {
        return view('mf_pricenodes.edit', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PriceNodes $priceNodes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PriceNodes $priceNodes)
    {
        //
    }
}
