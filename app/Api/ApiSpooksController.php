<?php

namespace App\Api;

use App\Http\Controllers\Controller;

class ApiSpooksController extends Controller
{
    public function index()
    {
        return response()->file(resource_path('spooks/discovery.json'));
    }
}