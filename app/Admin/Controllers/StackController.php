<?php

namespace App\Admin\Controllers;

use App\Stack;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Response;

class StackController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Stack';

    public function create(Content $content)
    {
        return parent::create($content);
    }

    public function edit($id, Content $content)
    {
        return parent::edit($id, $content);
    }

    /**
     * Show the application dashboard.
     * @param $id
     * @return Response
     */
    public function update($id)
    {
        return parent::update($id);
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Stack);
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('ID'))->sortable();
        $grid->column('title')->sortable();
        $grid->column('image')->image(env("UPLOAD_SERVER", "http://svc.shtrm88.ru/uploads"), 75, 75);
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
        $show = new Show(Stack::findOrFail($id));
        $show->field('id', __('ID'));
        $show->field('title');
        $show->field('description');
        $show->field('description_en');
        $show->field('description_de');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Stack());
        $form->text('title', 'Название')->rules('required|max:255');
        $form->textarea('description', 'Описание')->rules('required|min:10')->rows(10);
        $form->textarea('description_en', 'Описание (en)')->rules('required|min:10')->rows(10);
        $form->textarea('description_de', 'Описание (de)')->rules('required|min:10')->rows(10);
        $form->image('image');
        return $form;
    }
}
