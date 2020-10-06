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
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('ID'))->sortable();
        $grid->column('title')->sortable();
        $grid->column('tags')->display(function ($tags) {
            if (isset($tags) && count($tags)) {
                return $tags[0]['title'];
            }
        });
        $grid->column('git');
        $grid->column('link');
        $grid->column('stack');
        $grid->column('role');
        $grid->column('usage');
        $grid->column('categories')->display(function ($categories) {
            if (isset($categories) && count($categories)) {
                return $categories[0]['title'];
            }
        });
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
        $show->field('title_en');
        $show->field('title_de');
        $show->field('description');
        $show->field('description_en');
        $show->field('description_de');
        $show->field('years');
        $show->field('git');
        $show->field('link');
        $show->field('stack');
        $show->field('role');
        $show->field('usage');
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
        $form->text('title_en', 'Название (en)')->rules('required|max:255');
        $form->text('title_de', 'Название (de)')->rules('required|max:255');
        $form->textarea('description', 'Описание')->rules('required|min:10')->rows(10);
        $form->textarea('description_en', 'Описание (en)')->rules('required|min:10')->rows(10);
        $form->textarea('description_de', 'Описание (de)')->rules('required|min:10')->rows(10);
        $form->text('git', 'Git');
        $form->text('link', 'Ссылка');
        $form->text('stack', 'Стек')->rules('required|min:3');
        $form->text('role', 'Роль')->rules('required|min:5');
        $form->text('usage', 'Использование');
        $form->multipleSelect('tags')->options(Tag::all()->pluck('title', 'id'));
        $form->multipleSelect('categories')->options(Category::all()->pluck('title', 'id'));
        $form->text('years');
        $form->image('photo')->thumbnail('small', $width = 300, $height = 300);
        $form->multipleFile('photos', 'Фотографии')->pathColumn('path')->removable();
        return $form;
    }
}
