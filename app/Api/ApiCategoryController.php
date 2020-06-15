<?php

namespace App\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApiCategoryController extends Controller
{
    /**
     * Вернуть список всех доступных категорий
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Вернуть категорию по ид
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

}