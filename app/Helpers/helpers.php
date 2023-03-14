<?php
use App\Models\Location;
if (!function_exists('getLocationName')) {
    function getLocationName($id){
        $emp= Location::select('full_name')
        ->where("id","=",$id)
        ->get();

        $name= $emp[0]['full_name'];

        return $name;
    }
}
?>