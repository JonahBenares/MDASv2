<?php
use App\Models\Grid;
if (!function_exists('getGridName')) {
    function getGridName($id){
        $emp= Grid::select('grid_name')
        ->where("id","=",$id)
        ->get();

        $name= $emp[0]['grid_name'];

        return $name;
    }
}
?>