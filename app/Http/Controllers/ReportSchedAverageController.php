<?php

namespace App\Http\Controllers;

use App\Models\ReportSchedAverage;
use Illuminate\Http\Request;

class ReportSchedAverageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report_sched_average.index');
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
    public function show(ReportSchedAverage $reportSchedAverage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportSchedAverage $reportSchedAverage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportSchedAverage $reportSchedAverage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportSchedAverage $reportSchedAverage)
    {
        //
    }
}
