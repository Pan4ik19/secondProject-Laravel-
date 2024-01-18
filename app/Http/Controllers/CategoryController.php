<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryPostRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(AddCategoryPostRequest $request)
    {
        $fieldsValidate = $request->validated();
        $category = Category::create($fieldsValidate);
        $category->save();
        return $category;
    }

    public function getCategories()
    {
        return Category::all();
    }
}
