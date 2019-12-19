<?php

namespace App\Admin\Controllers;

use App\Photos;
use App\Projects;
use App\Tags;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProjectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Projects';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Projects);
        $grid->column('id', __('ID'))->sortable();
        $grid->column('title')->sortable();
        $grid->column('description');
        $grid->column('tags');
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
        $show = new Show(Projects::findOrFail($id));
        $show->field('id', __('ID'));
        $show->field('title');
        $show->field('description');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Projects);
        $form->text('title', 'Название')->rules('required|max:255');
        $form->text('description', 'Описание')->rules('required|min:10');
        $form->multipleSelect('tags')->options(Tags::all()->pluck('title', 'id'));
        //$form->multipleImage('photos')->options(Photos::all()->pluck('title', 'id'));
        $form->multipleImage('photos');
        return $form;
    }
}
