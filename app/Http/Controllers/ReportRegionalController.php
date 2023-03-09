<?php

namespace App\Http\Controllers;

use App\Models\ReportRegional;
use Illuminate\Http\Request;

class ReportRegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report_regional.index');
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
    public function show(ReportRegional $reportRegional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportRegional $reportRegional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportRegional $reportRegional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportRegional $reportRegional)
    {
        //
    }
}
