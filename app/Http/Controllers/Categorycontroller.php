<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class Categorycontroller extends Controller
{

    public function getAllCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
