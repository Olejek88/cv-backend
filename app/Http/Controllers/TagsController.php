<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TagsController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('tag', ['tag' => Tags::findOrFail($id)]);
    }

    /**
     * Показать список всех доступных рейсов.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tags::all();
        return view('tags', ['tags' => $tags]);
    }
}