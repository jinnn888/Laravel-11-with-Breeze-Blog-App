<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function fetchAll() {
        return response()->json(Category::all());
    }
    public function getSingle(Category $category) {
        return response()->json($category->tags);
    }
}
