<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Response;

class ApiProjectsController extends Controller
{
    /**
     * Вернуть список всех доступных проектов
     * @return Response
     */
    public function index()
    {
        $projects = Project::with('tags')->get();
        return response()->json($projects);
    }

    /**
     * Вернуть проект по ид
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $project = Project::with('tags')->where('id', $id)->get();
        return response()->json($project);
    }

    /**
     * Вернуть теги проекта по ид
     * @param int $id
     * @return Response
     */
    public function tags($id)
    {
        $tags = [];
        $project = Project::find($id);
        if ($project) {
            $tags = $project->tags;
        }
        return response()->json($tags);
    }

}