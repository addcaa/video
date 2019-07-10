<?php

namespace App\Admin\Controllers;

use App\Model\VideoModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VideoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '视频管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VideoModel);

        $grid->column('vid', __('Vid'));
        $grid->column('title', __('Title'));
        $grid->column('path', __('Path'));
        $grid->column('add_time', __('Add time'));

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
        $show = new Show(VideoModel::findOrFail($id));

        $show->field('vid', __('Vid'));
        $show->field('title', __('Title'));
        $show->field('path', __('Path'));
        $show->field('add_time', __('Add time'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new VideoModel);
        $form->text('title', __('视频名称'));
        $form->file('path', __('视频上传'))->uniqueName();
        $form->datetime('add_time', __('Add time'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
