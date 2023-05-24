<?php

namespace App\Http\Controllers;

use App\Models\ReportRegionalWeekly;
use App\Models\UploadRegional;
use App\Models\Grid;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportRegionalWeeklyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regional_load=UploadRegional::all();
        $grid=Grid::all()->sortBy('grid_name');
        return view('report_regional_weekly.index',compact('regional_load','grid'));
    }

    public function filter_regionalweekly(Request $request){
        $grid=Grid::all()->sortBy('grid_name');
        if(!empty($request->date_from) && !empty($request->date_to)){
            $date_from=$request->date_from;
            $date_to=$request->date_to;
        }else{
            $date_from='';
            $date_to='';
        }

        if(!empty($request->grid)){
            $grid_disp=$request->grid;
        }else{
            $grid_disp='';
        }
        $weeklyregionalArray = [];
        UploadRegional::select(['time_interval','commodity_id','grid_id','run_time','demand','generation','losses','import','export'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
            return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
        })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->groupBy(DB::raw('DATE(run_time)'))->orderBy(DB::raw('DATE(run_time)'),'ASC')->chunk(100, function($regionalweekly) use(&$weeklyregionalArray) {
            foreach ($regionalweekly as $rw) {
                $weeklyregionalArray[] = $rw;
            }
        });

        $graph=UploadRegional::select(['time_interval','commodity_id','grid_id','run_time','demand','generation','losses','import','export'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
            return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
        })->when(($grid_disp), function ($q) use ($grid_disp) {
            return $q->where('grid_id',$grid_disp);
        })->groupBy(DB::raw('DATE(run_time)'))->get();

        $data = [];
        foreach($graph AS $g){
            $data['label'][] = date('m/d/Y',strtotime($g->run_time));
            $data['demand'][] = UploadRegional::whereDate("run_time",date('Y-m-d',strtotime($g->run_time)))->when(($grid_disp), function ($q) use ($grid_disp) {
                return $q->where('grid_id',$grid_disp);
            })->groupBy(DB::raw('date(run_time)'))->avg('demand');
            $data['generation'][] = UploadRegional::whereDate("run_time",$g->run_time)->when(($grid_disp), function ($q) use ($grid_disp) {
                return $q->where('grid_id',$grid_disp);
            })->groupBy(DB::raw('date(run_time)'))->avg('generation');
            $data['losses'][] = UploadRegional::whereDate("run_time",$g->run_time)->when(($grid_disp), function ($q) use ($grid_disp) {
                return $q->where('grid_id',$grid_disp);
            })->groupBy(DB::raw('date(run_time)'))->avg('losses');
            $data['import'][] = UploadRegional::whereDate("run_time",$g->run_time)->when(($grid_disp), function ($q) use ($grid_disp) {
                return $q->where('grid_id',$grid_disp);
            })->groupBy(DB::raw('date(run_time)'))->avg('import');
            $data['export'][] = UploadRegional::whereDate("run_time",$g->run_time)->when(($grid_disp), function ($q) use ($grid_disp) {
                return $q->where('grid_id',$grid_disp);
            })->groupBy(DB::raw('date(run_time)'))->avg('export');
        }
        $data['chart_data'] = json_encode($data, JSON_NUMERIC_CHECK);
        return view('report_regional_weekly.index',compact('weeklyregionalArray','grid','data'));
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
