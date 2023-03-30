<?php

namespace App\Http\Controllers;

use App\Models\ReportActualOutages;
use Illuminate\Http\Request;

class ReportActualOutagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report_actual_outages.index');
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
    public function show(ReportActualOutages $reportActualOutages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportActualOutages $reportActualOutages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportActualOutages $reportActualOutages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportActualOutages $reportActualOutages)
    {
        //
    }
}
