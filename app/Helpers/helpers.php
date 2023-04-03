<?php
use App\Models\Grid;
use App\Models\PowerplantResource;
use App\Models\PowerplantType;
use App\Models\PowerplantSub;
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
?>