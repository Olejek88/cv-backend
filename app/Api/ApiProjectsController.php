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
        $projects = Project::with(['tags', 'categories', 'photos'])->orderBy('created_at', 'desc')->get();
        return response()->json($projects);
    }

    /**
     * Вернуть список всех доступных проектов
     * @param $id
     * @return Response
     */
    public function tag($id)
    {
        $projects = Project::with(['tags', 'categories', 'photos'])
            ->whereHas('tags', function ($q) use ($id) {
                $q->where('tag.id', $id);
            })->orderBy('created_at', 'desc')->get();
        return response()->json($projects);
    }

    /**
     * Вернуть проект по ид
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $project = Project::with(['tags', 'categories', 'photos'])->where('id', $id)->first();
        return response()->json($project);
    }

    /**
     * Send all projects selected category
     * @param $id
     * @return Response
     */
    public function category($id)
    {
        $projects = Project::with(['tags', 'categories', 'photos'])
            ->whereHas('categories', function ($q) use ($id) {
                $q->where('category.id', $id);
            })->orderBy('created_at', 'desc')->get();
        return response()->json($projects);
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