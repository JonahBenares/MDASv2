<?php
use App\Models\Grid;
use App\Models\Region;
use App\Models\PowerplantResource;
use App\Models\Powerplant;
use App\Models\PowerplantType;
use App\Models\PowerplantSub;
use App\Models\UploadSchedule;
use App\Models\UploadRegional;
use App\Models\ResourceType;
use Illuminate\Support\Facades\DB;
if (!function_exists('getGridName')) {
    function getGridName($id){
        $emp= Grid::select('grid_name')
        ->where("id","=",$id)
        ->get();

        $name= $emp[0]['grid_name'];

        return $name;
    }
}

if (!function_exists('getReosurceid')) {
    function getReosurceid($id){
        $resource= PowerplantResource::select('resource_id')->where("powerplant_id","=",$id)->get();
        foreach($resource AS $r){
            echo $r->resource_id."<br>";
        }
    }
}

if (!function_exists('getTypename')) {
    function getTypename($id){
        $type= PowerplantType::select('type_name')->where("id","=",$id)->get();
        $type_name= $type[0]['type_name'];
        return $type_name;
    }
}

if (!function_exists('getSubtypename')) {
    function getSubtypename($id){
        $subtype= PowerplantSub::select('subtype_name')->where("id","=",$id)->get();
        $subtype_name= $subtype[0]['subtype_name'];
        return $subtype_name;
    }
}

if(!function_exists('generateRandomString')){
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if(!function_exists('getSchedmw')){
    function getSchedmw($resource_name,$hour,$minute) {
        // if($minute=="00:60:00"){
        //     $minutes='01:00:00';
        // }else{
        //     $minutes=$minute;
        // }
        $mw= UploadSchedule::where("resource_name",$resource_name)->where("run_hour",$hour)->where('time_interval','LIKE','%'.$minute.'%')->value('schedule_mw');
        return $mw;
    }
}

if(!function_exists('getSchedprice')){
    function getSchedprice($resource_name,$hour,$minute) {
        // if($minute=="60:00"){
        //     $minutes='01:00:00';
        // }else{
        //     $minutes=$minute;
        // }
        $lmp= UploadSchedule::where("resource_name",$resource_name)->where("run_hour",$hour)->where('time_interval','LIKE','%'.$minute.'%')->value('lmp');
        return $lmp;
    }
}

if(!function_exists('getLastinterval')){
    function getLastinterval($resource_name) {
        $interval= UploadSchedule::select('time_interval')->where("resource_name",$resource_name)->orderBy('time_interval','desc')->first();
        return $interval->time_interval;
    }
}

if(!function_exists('getResourcecolor')){
    function getResourcecolor($resource_name) {
        $powerplant_id= PowerplantResource::where("resource_id",$resource_name)->value('powerplant_id');
        $pp_type_id= Powerplant::where("id",$powerplant_id)->value('pp_type_id');
        $legend= PowerplantType::where("id",$pp_type_id)->value('legend');
        return $legend;
    }
}

if (!function_exists('getReosurcename')) {
    function getReosurcename($id){
        $resource= PowerplantResource::where("id","=",$id)->value('resource_id');
        return $resource;
    }
}

if (!function_exists('getReosurcetype')) {
    function getReosurcetype($id){
        $resource= ResourceType::where("id","=",$id)->value('resource_code');
        return $resource;
    }
}

if (!function_exists('getRegionname')) {
    function getRegionname($id){
        $resource= Region::where("id","=",$id)->value('region_name');
        return $resource;
    }
}

if(!function_exists('getAvgSchedule')){
    function getAvgSchedule($resource_name,$hour) {
        // if($minute=="60:00"){
        //     $minutes='01:00:00';
        // }else{
        //     $minutes=$minute;
        // }
        $minute_first= UploadSchedule::select('time_interval')->where("resource_name",$resource_name)->where("run_hour",$hour)->orderBy('time_interval','asc')->first();
        $minute_last= UploadSchedule::select('time_interval')->where("resource_name",$resource_name)->where("run_hour",$hour)->orderBy('time_interval','desc')->first();
        $avg= UploadSchedule::where("resource_name",$resource_name)->where("run_hour",$hour)->whereBetween('time_interval',[$minute_first->time_interval,$minute_last->time_interval])->avg('schedule_mw');
        return $avg;
    }
}

if(!function_exists('getAvgRegionalAvg')){
    function getAvgRegionalAvg($hour,$region_name,$commodity_type,$type) {
        // if($minute=="60:00"){
        //     $minutes='01:00:00';
        // }else{
        //     $minutes=$minute;
        // }
        // $minute_first= UploadRegional::select('time_interval')->where("grid_id",$region_name)->where("commodity_type",$commodity_type)->whereTime("time_interval",$hour)->orderBy('time_interval','asc')->first();
        // $minute_last= UploadRegional::select('time_interval')->where("grid_id",$region_name)->where("commodity_type",$commodity_type)->whereTime("time_interval",$hour)->orderBy('time_interval','desc')->first();
        //$minute_first= UploadRegional::select('time_interval')->where("grid_id",$region_name)->where("commodity_type",$commodity_type)->orderBy('time_interval','asc')->get();
       //foreach($minute_first AS $mf){
            //$avg= UploadRegional::where("grid_id",$region_name)->where("commodity_type",$commodity_type)->groupBy(DB::raw('hour(time_interval)'))->avg('demand');
            //$avg= UploadRegional::where("grid_id",$region_name)->where("commodity_type",$commodity_type)->whereBetween('time_interval',[$mf->time_interval,$hour])->avg('demand');
           // echo $hour;
        if(date('H:i',strtotime($hour))=='01:00'){
            $hours=date('Y-m-d 00:05',strtotime($hour));
        }else if(date('H:i',strtotime($hour))<='2:00'){
            $hours=date('Y-m-d H:05',strtotime($hour.'-1 hour'));
        }

        if(date('H:i',strtotime($hour))!='00:00'){
            if(date('H:i',strtotime($hour))=='01:00'){
                $hours2=date('Y-m-d H:i',strtotime($hour));
            }else if(date('H:i',strtotime($hour))<='2:00'){
                $hours2=date('Y-m-d H:i',strtotime($hour));
            }else{
                $hours2=date('Y-m-d H:i',strtotime($hour.'+1 hour'));
            }
        }else{
            $hours2=date('Y-m-d H:i',strtotime($hour));
        }
        if(empty($region_name)){
            $grid='';
        }else{
            $grid=" AND grid_id='$region_name'";
        }
        $avg=DB::select("SELECT AVG($type) AS average FROM regional_summary WHERE commodity_type='$commodity_type' $grid AND time_interval>='$hours' AND time_interval<='$hours2'  GROUP BY MINUTE(time_interval) div 5 * 5 ORDER BY hour(time_interval) ASC");
        $average=array();
        foreach($avg AS $v){
            $average[]=$v->average;
        }
        $sum=array_sum($average)/12;
        return $sum;
        //}
         
    }
}

if(!function_exists('getweeklyRegionalAvg')){
    function getweeklyRegionalAvg($time_interval,$region_name,$type) {
        $date=date('Y-m-d',strtotime($time_interval));
        $avg= UploadRegional::where('commodity_type','EN')->when((!empty($time_interval)), function ($q) use ($date) {
            return $q->whereDate('run_time',$date);
        })->when(($region_name!=0), function ($q) use ($region_name) {
            return $q->where('grid_id',$region_name);
        })->groupBy(DB::raw('date(run_time)'))->avg($type);
        return $avg;
    }
}
if (!function_exists('getDemandEN')) {
    function getDemandEN($time,$region_name,$commodity_type){
        $en_emand= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('demand');
        return $en_emand;
    }
}

if (!function_exists('getGenerationEN')) {
    function getGenerationEN($time,$region_name,$commodity_type){
        $en_generation= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('generation');
        return $en_generation;
    }
}

if (!function_exists('getLossesEN')) {
    function getLossesEN($time,$region_name,$commodity_type){
        $en_losses= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('losses');
        return $en_losses;
    }
}

if (!function_exists('getExportEN')) {
    function getExportEN($time,$region_name,$commodity_type){
        $en_export= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('export');
        return $en_export;
    }
}

if (!function_exists('getImportEN')) {
    function getImportEN($time,$region_name,$commodity_type){
        $en_import= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('import');
        return $en_import;
    }
}

if (!function_exists('getDemandDR')) {
    function getDemandDR($time,$region_name,$commodity_type){
        $dr_emand= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('demand');
        return $dr_emand;
    }
}

if (!function_exists('getGenerationDR')) {
    function getGenerationDR($time,$region_name,$commodity_type){
        $dr_generation= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('generation');
        return $dr_generation;
    }
}

if (!function_exists('getDemandFR')) {
    function getDemandFR($time,$region_name,$commodity_type){
        $fr_emand= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('demand');
        return $fr_emand;
    }
}

if (!function_exists('getGenerationFR')) {
    function getGenerationFR($time,$region_name,$commodity_type){
        $fr_generation= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('generation');
        return $fr_generation;
    }
}

if (!function_exists('getDemandRU')) {
    function getDemandRU($time,$region_name,$commodity_type){
        $ru_emand= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('demand');
        return $ru_emand;
    }
}

if (!function_exists('getGenerationRU')) {
    function getGenerationRU($time,$region_name,$commodity_type){
        $ru_generation= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('generation');
        return $ru_generation;
    }
}

if (!function_exists('getDemandRD')) {
    function getDemandRD($time,$region_name,$commodity_type){
        $rd_emand= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('demand');
        return $rd_emand;
    }
}

if (!function_exists('getGenerationRD')) {
    function getGenerationRD($time,$region_name,$commodity_type){
        $rd_generation= UploadRegional::where("grid_id","=",$region_name)->where("commodity_type","=",$commodity_type)->whereTime('time_interval',$time)->orderBy('time_interval','ASC')->value('generation');
        return $rd_generation;
    }
}

if (!function_exists('getCapacity')) {
    function getCapacity($id){
        $capacity= PowerPlant::where("pp_type_id","=",$id)->value('capacity_dependable');
        //$capacity_dependable= $capacity[0]['capacity_dependable'];
        return $capacity;
    }
}

if (!function_exists('getMaxOutage')) {
    function getMaxOutage($time,$resource_name,$pp_type_id){
        $max_outage= UploadSchedule::where("schedule_mw","=",'0')->where("resource_name","=",$resource_name)->where("pp_type_id","=",$pp_type_id)->whereDate('time_interval',date('Y-m-d',strtotime($time)))->max('time_interval');
        $min_outage= UploadSchedule::where("schedule_mw","=",'0')->where("resource_name","=",$resource_name)->where("pp_type_id","=",$pp_type_id)->whereDate('time_interval',date('Y-m-d',strtotime($time)))->min('time_interval');
        return date('H:i',strtotime($min_outage))."-".date('H:i',strtotime($max_outage));
    }
}


?>