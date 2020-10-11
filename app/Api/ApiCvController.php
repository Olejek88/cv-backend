<?php

namespace App\Api;

use App\Cv;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApiCvController extends Controller
{
    /**
     * Вернуть список всех доступных категорий
     * @return Response
     */
    public function index()
    {
        $cvs = Cv::with([])->orderBy('id', 'desc')->get();
        return response()->json($cvs);
    }
}