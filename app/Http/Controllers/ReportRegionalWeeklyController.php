<?php

namespace App\Http\Controllers;

use App\Models\ReportRegionalWeekly;
use Illuminate\Http\Request;

class ReportRegionalWeeklyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report_regional_weekly.index');
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
    public function show(ReportRegionalWeekly $reportRegionalWeekly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportRegionalWeekly $reportRegionalWeekly)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportRegionalWeekly $reportRegionalWeekly)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportRegionalWeekly $reportRegionalWeekly)
    {
        //
    }
}
