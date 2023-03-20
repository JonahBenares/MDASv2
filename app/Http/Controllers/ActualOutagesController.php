<?php

namespace App\Http\Controllers;

use App\Models\ActualOutages;
use Illuminate\Http\Request;

class ActualOutagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('actual_outages.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ActualOutages $actualOutages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActualOutages $actualOutages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActualOutages $actualOutages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActualOutages $actualOutages)
    {
        //
    }
}
