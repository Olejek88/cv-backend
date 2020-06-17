<?php

namespace App\Admin\Controllers;

use App\Category;
use App\Project;
use App\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Response;

class ProjectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Project';

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
        //return phpinfo();
        return parent::update($id);
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Project);
        $grid->column('id', __('ID'))->sortable();
        $grid->column('title')->sortable();
        $grid->column('description');
        $grid->column('tags');
        $grid->column('categories');
        $grid->column('photo')->image('http://svc.shtrm88.ru/uploads', 100, 100);
        $grid->column('years');
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
        $show = new Show(Project::findOrFail($id));
        $show->field('id', __('ID'));
        $show->field('title');
        $show->field('description');
        $show->field('years');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Project);
        $form->text('title', 'Название')->rules('required|max:255');
        $form->text('description', 'Описание')->rules('required|min:10');
        $form->multipleSelect('tags')->options(Tag::all()->pluck('title', 'id'));
        $form->multipleSelect('categories')->options(Category::all()->pluck('title', 'id'));
        $form->text('years');
        $form->image('photo')->thumbnail('small', $width = 300, $height = 300);
        $form->multipleFile('photos', 'Fotos')->pathColumn('path')->removable();
        return $form;
    }
}
