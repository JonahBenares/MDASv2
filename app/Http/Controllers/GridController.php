<?php

namespace App\Http\Controllers;

use App\Models\Grid;
use Illuminate\Http\Request;

class GridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mf_grid.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mf_grid.create');
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
    public function show(Grid $grid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grid $id)
    {
        return view('mf_grid.edit', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grid $grid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grid $grid)
    {
        //
    }
}
