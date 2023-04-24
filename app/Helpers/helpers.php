<?php
use App\Models\Grid;
use App\Models\Region;
use App\Models\PowerplantResource;
use App\Models\Powerplant;
use App\Models\PowerplantType;
use App\Models\PowerplantSub;
use App\Models\UploadSchedule;
use App\Models\ResourceType;
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
?>