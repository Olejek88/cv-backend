<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('category', ['category' => Category::findOrFail($id)]);
    }

    /**
     * Показать список всех доступных
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category', ['category' => $categories]);
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
            /** @var Category $category */
            $category = new Category();
            $category->title = $request->title;
            $category->save();
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
        $grid = new Grid(new Category());

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
        $show = new Show(Category::findOrFail($id));

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
        $form = new Form(new Category());
        $form->display('title');
        return $form;
    }
}