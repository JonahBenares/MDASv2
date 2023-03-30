<?php

namespace App\Http\Controllers;

use App\Models\ReportOutagesType;
use Illuminate\Http\Request;

class ReportOutagesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report_outages_type.index');
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
    public function show(ReportOutagesType $reportOutagesType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportOutagesType $reportOutagesType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportOutagesType $reportOutagesType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportOutagesType $reportOutagesType)
    {
        //
    }
}
