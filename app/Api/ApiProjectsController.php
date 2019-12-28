<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Project;
use App\Tag;
use Illuminate\Http\Response;

class ApiProjectsController extends Controller
{
    /**
     * Вернуть список всех доступных проектов
     * @return Response
     */
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    /**
     * Вернуть проект по ид
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }
}