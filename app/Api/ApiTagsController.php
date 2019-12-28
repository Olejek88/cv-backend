<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Response;

class ApiTagsController extends Controller
{
    /**
     * Вернуть список всех доступных тегов
     * @return Response
     */
    public function index()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    /**
     * Вернуть тег по ид
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json($tag);
    }

}