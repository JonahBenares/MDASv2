<?php

namespace App\Http\Controllers;

use App\Models\ReportRegionalAverage;
use Illuminate\Http\Request;

class ReportRegionalAverageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report_regional_average.index');
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
    public function show(ReportRegionalAverage $reportRegionalAverage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportRegionalAverage $reportRegionalAverage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportRegionalAverage $reportRegionalAverage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportRegionalAverage $reportRegionalAverage)
    {
        //
    }
}
