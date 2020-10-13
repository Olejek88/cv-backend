<?php

namespace App\Admin\Controllers;

use App\About;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Response;

class AboutController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\About';

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
        $grid = new Grid(new About);
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('ID'))->sortable();
        $grid->column('position')->sortable();
        $grid->column('image')->image('http://svc.shtrm88.ru/uploads', 76, 76);
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
        $show = new Show(About::findOrFail($id));
        $show->field('id', __('ID'));
        $show->field('contact');
        $show->field('position');
        $show->field('position_en');
        $show->field('position_de');
        $show->field('courses');
        $show->field('skills');
        $show->field('skills_en');
        $show->field('skills_de');
        $show->field('addition');
        $show->field('addition_en');
        $show->field('addition_de');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new About);
        $form->textarea('contact', 'Контакт')->rules('required');
        $form->textarea('position', 'Позиция')->rules('required');
        $form->textarea('position_en', 'Позиция (en)')->rules('required');
        $form->textarea('position_de', 'Позиция (de)')->rules('required');
        $form->textarea('courses', 'Курсы')->rules('required');
        $form->textarea('skills', 'Навыки')->rules('required|min:10')->rows(10);
        $form->textarea('skills_en', 'Навыки (en)')->rules('required|min:10')->rows(10);
        $form->textarea('skills_de', 'Навыки (de)')->rules('required|min:10')->rows(10);
        $form->textarea('addition', 'Дополнительно')->rules('required|min:10')->rows(10);
        $form->textarea('addition_en', 'Дополнительно (en)')->rules('required|min:10')->rows(10);
        $form->textarea('addition_de', 'Дополнительно (de)')->rules('required|min:10')->rows(10);
        $form->image('image');
        return $form;
    }
}
