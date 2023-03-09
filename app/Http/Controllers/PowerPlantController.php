<?php

namespace App\Http\Controllers;

use App\Models\PowerPlant;
use Illuminate\Http\Request;

class PowerPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('power_plant.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('power_plant.create');
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
