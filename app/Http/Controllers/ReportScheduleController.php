<?php

namespace App\Http\Controllers;

use App\Models\ReportSchedule;
use App\Models\PowerplantType;
use Illuminate\Http\Request;

class ReportScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $powerplant_type=PowerplantType::all()->sortBy('type_name');
        return view('report_schedule.index',compact('powerplant_type'));
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
    public function show(ReportSchedule $reportSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportSchedule $reportSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportSchedule $reportSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportSchedule $reportSchedule)
    {
        //
    }
}
