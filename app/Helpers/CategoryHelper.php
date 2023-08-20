<?php

use App\Models\Category;

if (!function_exists("showCategory")){
    function showCategory($categories, $parent,$char, $parent_id_child){
        foreach ($categories as $category){
            if ($category["parent"] == $parent){
                if ($category['id']==$parent_id_child){
                    echo "<option value='".$category["id"]."' selected>".$category["name"]."</option>";
                }
                else{
                    echo "<option value='".$category["id"]."'>".$category["name"]."</option>";

                }
                $newParent = $category["id"];
                showCategory($categories, $newParent, $char."|--",$parent_id_child);
            }
        }
    }
}

