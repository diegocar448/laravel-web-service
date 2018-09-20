<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category, Request $request)
    {
        $categories = $category->getResults($request->name);

        return response()->json($categories);
    }
}