<?php

namespace App\Http\Controllers;

use App\Tag;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TagController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('tag', ['tag' => Tag::findOrFail($id)]);
    }

    /**
     * Показать список всех доступных тегов
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag', ['tag' => $tags]);
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
            /** @var Tag $tag */
            $tag = new Tag();
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
        $grid = new Grid(new Tag());

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
        $show = new Show(Tag::findOrFail($id));

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
        $form = new Form(new Tag());
        $form->display('title');
        return $form;
    }
}