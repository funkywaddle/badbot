<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class CategoryService {

    private $model;
    private $dcss_model;
    private $buttons_model;

    public function __construct(Model $model, Model $dcss_model, Model $buttons_model) {
        $this->model = $model;
        $this->dcss_model = $dcss_model;
        $this->buttons_model = $buttons_model;
    }

    public function getList($onlyActive = true) {
        if($onlyActive == true){
            $cats = $this->model->where('active', 1)->get();
        } else {
            $cats = $this->model->all();
        }
        return $cats;
    }

    public function getSingleById($id) {
        return $this->model->with(['dashboard_css'])->where('id', $id)->first();
    }

    public function addSingle($data) {
        $category = new $this->model;
        $category->name = $data['categoryName'];
        $category->code = $data['categoryCode'];
        $category->save();

        $css = $this->fill_css(new $this->dcss_model, $data);

        $category->dashboard_css()->save($css);
    }

    public function updateSingle($id, $data) {
        $category = $this->getSingleById($id);

        $category->name = $data['categoryName'];
        $category->code = $data['categoryCode'];
        $category->save();

        $css = $this->fill_css($category->dashboard_css, $data);

        $category->dashboard_css()->save($css);
    }

    public function toggleShow($id) {
        $category = $this->getSingleById($id);

        $category->active = !$category->active;
        $category->save();
    }

    private function fill_css($css, $data) {
        $css->borderColor = $data['borderColor'];
        $css->borderSize = $data['borderSize'];
        $css->backgroundColor = $data['backgroundColor'];
        $css->textColor = $data['textColor'];
        $css->hoverBorderColor = $data['hoverBorderColor'];
        $css->hoverBorderSize = $data['hoverBorderSize'];
        $css->hoverBackgroundColor = $data['hoverBackgroundColor'];
        $css->hoverTextColor = $data['hoverTextColor'];

        return $css;
    }

    public function deleteSingle($id) {
//        $category = $this->getSingleById($id);
//        $this->dcss_model->destroy($category->dashboard_css->id);
//        $this->buttons_model->destroy($category->buttons);
        $this->model->destroy($id);
    }

}
