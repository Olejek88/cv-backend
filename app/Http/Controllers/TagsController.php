<?php

namespace App\Http\Controllers;

use App\Tags;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
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
     * Показать список всех доступных тегов
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tags::all();
        return view('tags', ['tags' => $tags]);
    }

    /**
     * Добавть тег
     *
     * @param Request $request
     * @return Response
     */
    public function add(Request $request)
    {
        // выполнять код, если есть POST-запрос
        if ($request->isMethod('post')) {
            /** @var Tags $tag */
            $tag = new Tags();
            $tag->title = $request->title;
            $tag->save();
            return self::index();
        }
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tags());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('title')->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Tags::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tags());
        $form->display('title');
        return $form;
    }
}