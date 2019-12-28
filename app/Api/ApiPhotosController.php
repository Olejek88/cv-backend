<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Photo;
use App\Project;
use App\Tag;
use Illuminate\Http\Response;

class ApiPhotosController extends Controller
{
    /**
     * Вернуть список всех доступных фотографий
     * @return Response
     */
    public function index()
    {
        $photos = Photo::all();
        return response()->json($photos);
    }

    /**
     * Вернуть фото по ид
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        return response()->json($photo);
    }

}