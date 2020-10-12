<?php

namespace App\Api;

use App\Career;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApiCareerController extends Controller
{
    /**
     * Вернуть список всех доступных категорий
     * @return Response
     */
    public function index()
    {
        $careers = Career::with([])->orderBy('id', 'desc')->get();
        return response()->json($careers);
    }
}