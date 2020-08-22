<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class FormController extends Controller
{
    public function getCategories()
    {
        $categories = DB::table('categories')->pluck("name","id");
        return view('form',compact('categories'));
    }

    public function getSubcategories($id) 
    {        
            $subcategories = DB::table("subcategories")->where("categories_id",$id)->pluck("name","id");
            return json_encode($subcategories);
    }
}
