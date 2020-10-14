<?php

namespace App\Api;

use App\Cv;
use App\Http\Controllers\Controller;
use App\Stack;
use Illuminate\Http\Response;

class ApiStackController extends Controller
{
    /**
     * Вернуть список стеков
     * @return Response
     */
    public function index()
    {
        $stacks = Stack::with([])->orderBy('id', 'desc')->get();
        return response()->json($stacks);
    }
}