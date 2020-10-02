<?php

namespace App\Admin\Controllers;

use App\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class CategoriesController extends AdminController
{

    /**
     * Добавть тег
     *
     * @param Request $request
     */
    public function add(Request $request)
    {
        // выполнять код, если есть POST-запрос
        if ($request->isMethod('post')) {
            /** @var Category $category */
            $category = new Category();
            $category->title = $request->title;
            $category->save();
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
        $grid->column('title_en')->sortable();
        $grid->column('title_de')->sortable();
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
        $show->field('title_en');
        $show->field('title_de');
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
        $form->text('title', 'Название')->rules('required|max:255');
        $form->text('title_en', 'Название (en)')->rules('required|max:255');
        $form->text('title_de', 'Название (de)')->rules('required|max:255');
        return $form;
    }
}