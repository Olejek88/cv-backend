<?php

namespace App\Api;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApiAboutController extends Controller
{
    /**
     * Вернуть список всех доступных категорий
     * @return Response
     */
    public function index()
    {
        $about = About::with([])->orderBy('id', 'desc')->get();
        return response()->json($about);
    }
}