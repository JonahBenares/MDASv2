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
            $grid_disp=array();
            foreach ($request->grid as $key => $value) {
                $grid_disp[]=$request->grid[$key];
            }
            $check_exist=getGridNameMultiple($grid_disp);
            if(str_contains($check_exist,"LUZON")){
                $luzon='CLUZ';
            }else{
                $luzon='';
            }
            if(str_contains($check_exist,"VISAYAS")){
                $visayas='CVIS';
            }else{
                $visayas='';
            }
            if(str_contains($check_exist,"MINDANAO")){
                $mindanao='CMIN';
            }else{
                $mindanao='';
            }
        }else{
            $grid_disp=array();
            $luzon='';
            $visayas='';
            $mindanao='';
        }
        $weeklyregionalArray = [];
        $weeklyregionalLuzonArray = [];
        $weeklyregionalMindanaoArray = [];
        $weeklyregionalVisayasArray = [];
        $data = [];
        $dataluz = [];
        $datamin = [];
        $datavis = [];
        if(count($grid_disp)<=1){
            UploadRegional::select(['grid_id','run_time'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
                return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
            })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
                return $q->whereIn('grid_id',$grid_disp);
            })->groupBy(DB::raw('DATE(run_time)'))->orderBy(DB::raw('DATE(run_time)'),'ASC')->chunk(100, function($regionalweekly) use(&$weeklyregionalArray) {
                foreach ($regionalweekly as $rw) {
                    $weeklyregionalArray[] = $rw;
                }
            });

            $graph=UploadRegional::select(['time_interval','commodity_id','grid_id','run_time','demand','generation','losses','import','export'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
                return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
            })->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
                return $q->whereIn('grid_id',$grid_disp);
            })->groupBy(DB::raw('DATE(run_time)'))->get();

            foreach($graph AS $g){
                $data['label'][] = date('m/d/Y',strtotime($g->run_time));
                $data['demand'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",date('Y-m-d',strtotime($g->run_time)))->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
                    return $q->whereIn('grid_id',$grid_disp);
                })->groupBy(DB::raw('date(run_time)'))->avg('demand');
                $data['generation'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
                    return $q->whereIn('grid_id',$grid_disp);
                })->groupBy(DB::raw('date(run_time)'))->avg('generation');
                $data['losses'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
                    return $q->whereIn('grid_id',$grid_disp);
                })->groupBy(DB::raw('date(run_time)'))->avg('losses');
                $data['import'][] = "-".UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
                    return $q->whereIn('grid_id',$grid_disp);
                })->groupBy(DB::raw('date(run_time)'))->avg('import');
                $data['export'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
                    return $q->whereIn('grid_id',$grid_disp);
                })->groupBy(DB::raw('date(run_time)'))->avg('export');

                $import_disp="-".UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
                    return $q->whereIn('grid_id',$grid_disp);
                })->groupBy(DB::raw('date(run_time)'))->avg('import');
                $export_disp=UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp) {
                    return $q->whereIn('grid_id',$grid_disp);
                })->groupBy(DB::raw('date(run_time)'))->avg('export');
                $net=$import_disp+$export_disp;
                $data['net'][]=$net;
            }
            $data['chart_data'] = json_encode($data, JSON_NUMERIC_CHECK);
        }else{
            if($luzon=='CLUZ'){
                UploadRegional::select(['grid_id','run_time'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
                    return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
                })->when((!empty($grid_disp)), function ($q) use ($grid_disp,$luzon) {
                    return $q->where('region_name',$luzon);
                })->groupBy(DB::raw('DATE(run_time)'))->orderBy(DB::raw('DATE(run_time)'),'ASC')->chunk(100, function($regionalweekly) use(&$weeklyregionalLuzonArray) {
                    foreach ($regionalweekly as $rw) {
                        $weeklyregionalLuzonArray[] = $rw;
                    }
                });

                $graph=UploadRegional::select(['time_interval','commodity_id','grid_id','run_time','demand','generation','losses','import','export'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
                    return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
                })->when((!empty($grid_disp)), function ($q) use ($grid_disp,$luzon) {
                    return $q->where('region_name',$luzon);
                })->groupBy(DB::raw('DATE(run_time)'))->get();

                foreach($graph AS $g){
                    $dataluz['label'][] = date('m/d/Y',strtotime($g->run_time));
                    $dataluz['demand'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",date('Y-m-d',strtotime($g->run_time)))->when((!empty($grid_disp)), function ($q) use ($grid_disp,$luzon) {
                        return $q->where('region_name',$luzon);
                    })->groupBy(DB::raw('date(run_time)'))->avg('demand');
                    $dataluz['generation'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$luzon) {
                        return $q->where('region_name',$luzon);
                    })->groupBy(DB::raw('date(run_time)'))->avg('generation');
                    $dataluz['losses'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$luzon) {
                        return $q->where('region_name',$luzon);
                    })->groupBy(DB::raw('date(run_time)'))->avg('losses');
                    $dataluz['import'][] = "-".UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$luzon) {
                        return $q->where('region_name',$luzon);
                    })->groupBy(DB::raw('date(run_time)'))->avg('import');
                    $dataluz['export'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$luzon) {
                        return $q->where('region_name',$luzon);
                    })->groupBy(DB::raw('date(run_time)'))->avg('export');

                    $import_disp="-".UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$luzon) {
                        return $q->where('region_name',$luzon);
                    })->groupBy(DB::raw('date(run_time)'))->avg('import');
                    $export_disp=UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$luzon) {
                        return $q->where('region_name',$luzon);
                    })->groupBy(DB::raw('date(run_time)'))->avg('export');
                    $net=$import_disp+$export_disp;
                    $dataluz['net'][]=$net;
                }
                $dataluz['chart_dataluz'] = json_encode($dataluz, JSON_NUMERIC_CHECK);
            }

            if($visayas=='CVIS'){
                UploadRegional::select(['grid_id','run_time'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
                    return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
                })->when((!empty($grid_disp)), function ($q) use ($grid_disp,$visayas) {
                    return $q->where('region_name',$visayas);
                })->groupBy(DB::raw('DATE(run_time)'))->orderBy(DB::raw('DATE(run_time)'),'ASC')->chunk(100, function($regionalweekly) use(&$weeklyregionalVisayasArray) {
                    foreach ($regionalweekly as $rw) {
                        $weeklyregionalVisayasArray[] = $rw;
                    }
                });

                $graph=UploadRegional::select(['time_interval','commodity_id','grid_id','run_time','demand','generation','losses','import','export'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
                    return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
                })->when((!empty($grid_disp)), function ($q) use ($grid_disp,$visayas) {
                    return $q->where('region_name',$visayas);
                })->groupBy(DB::raw('DATE(run_time)'))->get();

                foreach($graph AS $g){
                    $datavis['label'][] = date('m/d/Y',strtotime($g->run_time));
                    $datavis['demand'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",date('Y-m-d',strtotime($g->run_time)))->when((!empty($grid_disp)), function ($q) use ($grid_disp,$visayas) {
                        return $q->where('region_name',$visayas);
                    })->groupBy(DB::raw('date(run_time)'))->avg('demand');
                    $datavis['generation'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$visayas) {
                        return $q->where('region_name',$visayas);
                    })->groupBy(DB::raw('date(run_time)'))->avg('generation');
                    $datavis['losses'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$visayas) {
                        return $q->where('region_name',$visayas);
                    })->groupBy(DB::raw('date(run_time)'))->avg('losses');
                    $datavis['import'][] = "-".UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$visayas) {
                        return $q->where('region_name',$visayas);
                    })->groupBy(DB::raw('date(run_time)'))->avg('import');
                    $datavis['export'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$visayas) {
                        return $q->where('region_name',$visayas);
                    })->groupBy(DB::raw('date(run_time)'))->avg('export');

                    $import_disp="-".UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$visayas) {
                        return $q->where('region_name',$visayas);
                    })->groupBy(DB::raw('date(run_time)'))->avg('import');
                    $export_disp=UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$visayas) {
                        return $q->where('region_name',$visayas);
                    })->groupBy(DB::raw('date(run_time)'))->avg('export');
                    $net=$import_disp+$export_disp;
                    $datavis['net'][]=$net;
                }
                $datavis['chart_datavis'] = json_encode($datavis, JSON_NUMERIC_CHECK);
            }

            if($mindanao=='CMIN'){
                UploadRegional::select(['grid_id','run_time'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
                    return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
                })->when((!empty($grid_disp)), function ($q) use ($grid_disp,$mindanao) {
                    return $q->where('region_name',$mindanao);
                })->groupBy(DB::raw('DATE(run_time)'))->orderBy(DB::raw('DATE(run_time)'),'ASC')->chunk(100, function($regionalweekly) use(&$weeklyregionalMindanaoArray) {
                    foreach ($regionalweekly as $rw) {
                        $weeklyregionalMindanaoArray[] = $rw;
                    }
                });

                $graph=UploadRegional::select(['time_interval','commodity_id','grid_id','run_time','demand','generation','losses','import','export'])->when((!empty($date_from) && !empty($date_to)), function ($q) use ($date_from,$date_to) {
                    return $q->whereBetween(DB::raw('DATE(run_time)'), array($date_from, $date_to));
                })->when((!empty($grid_disp)), function ($q) use ($grid_disp,$mindanao) {
                    return $q->where('region_name',$mindanao);
                })->groupBy(DB::raw('DATE(run_time)'))->get();

                foreach($graph AS $g){
                    $datamin['label'][] = date('m/d/Y',strtotime($g->run_time));
                    $datamin['demand'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",date('Y-m-d',strtotime($g->run_time)))->when((!empty($grid_disp)), function ($q) use ($grid_disp,$mindanao) {
                        return $q->where('region_name',$mindanao);
                    })->groupBy(DB::raw('date(run_time)'))->avg('demand');
                    $datamin['generation'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$mindanao) {
                        return $q->where('region_name',$mindanao);
                    })->groupBy(DB::raw('date(run_time)'))->avg('generation');
                    $datamin['losses'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$mindanao) {
                        return $q->where('region_name',$mindanao);
                    })->groupBy(DB::raw('date(run_time)'))->avg('losses');
                    $datamin['import'][] = "-".UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$mindanao) {
                        return $q->where('region_name',$mindanao);
                    })->groupBy(DB::raw('date(run_time)'))->avg('import');
                    $datamin['export'][] = UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$mindanao) {
                        return $q->where('region_name',$mindanao);
                    })->groupBy(DB::raw('date(run_time)'))->avg('export');

                    $import_disp="-".UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$mindanao) {
                        return $q->where('region_name',$mindanao);
                    })->groupBy(DB::raw('date(run_time)'))->avg('import');
                    $export_disp=UploadRegional::where('commodity_type','En')->whereDate("run_time",$g->run_time)->when((!empty($grid_disp)), function ($q) use ($grid_disp,$mindanao) {
                        return $q->where('region_name',$mindanao);
                    })->groupBy(DB::raw('date(run_time)'))->avg('export');
                    $net=$import_disp+$export_disp;
                    $datamin['net'][]=$net;
                }
                $datamin['chart_datamin'] = json_encode($datamin, JSON_NUMERIC_CHECK);
            }
        }
        return view('report_regional_weekly.index',compact('weeklyregionalArray','weeklyregionalLuzonArray','weeklyregionalVisayasArray','weeklyregionalMindanaoArray','grid','data','dataluz','datavis','datamin'));
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
