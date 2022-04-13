<?php


namespace App\Services;

use App\Models\Button;
use DemeterChain\B;
use Illuminate\Database\Eloquent\Model;
use App\Models\ButtonOptions;

class ButtonsService {

    private $model;
    private $category_model;
    private $currency_model;
    private $button_option_model;

    public function __construct(Model $model, Model $category_model, Model $currency_model, Model $button_option_model) {
        $this->model = $model;
        $this->category_model = $category_model;
        $this->currency_model = $currency_model;
        $this->button_option_model = $button_option_model;
    }

    public function getAll() {
        $buttons = $this->model->with(['category', 'currency', 'options'])->get();
        $categories = $this->category_model->where('active', 1)->get();
        return ['buttons'=>$buttons, 'categories'=>$categories];
    }

    public function getList() {
        return $this->model->with(['category', 'currency', 'options'])->get();
    }

    public function getSingleById($id) {
        return $this->model->with(['category','currency','options'])->where('id', $id)->first();
    }

    public function addSingle($data) {
        $button = new $this->model;
        $category = $this->category_model->find($data['category']);
        $currency = $this->currency_model->find($data['currency']);


        $button->command = $data['command'];
        $button->price = $data['price'];
        $button->description = $data['description'];

        $button->category()->associate($category);
        $button->currency()->associate($currency);

        $button->save();

        $this->getButtonOptions($data, $button);
    }

    public function updateSingle($id, $data) {
        $button = $this->getSingleById($id);
        $category = $this->category_model->find($data['category']);
        $currency = $this->currency_model->find($data['currency']);


        $button->command = $data['command'];
        $button->price = $data['price'];
        $button->description = $data['description'];

        $button->category()->associate($category);
        $button->currency()->associate($currency);

        $this->removeButtonOptions($button->options);
        $this->getButtonOptions($data, $button);

        $button->save();
    }

    public function deleteSingle($id) {
        $this->model->destroy($id);
    }

    private function removeButtonOptions($options) {
        foreach($options as $option){
            $this->button_option_model->destroy($option->id);
        }
    }

    private function getButtonOptions($data, $button) {
        if(array_key_exists('options', $data)) {
            $this->getLetterButtonOptions($data['options'], $button);
            $this->getNumberButtonOptions($data['options'], $button);
            $this->getDirectionButtonOptions($data['options'], $button);
            $this->getSpecialButtonOptions($data['options'], $button);
            $this->getMouseButtonOptions($data['options'], $button);
        }
    }

    private function createNewOption($item, Button $button) {
        $tmp = new ButtonOptions();
        $tmp->option = $item;
        $button->options()->save($tmp);
        return $tmp;
    }

    private function getLetterButtonOptions($data, $button) {
        $options = [];

        error_log(print_r($data, 1));

        foreach(['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'] as $letter) {
            if(in_array('all-letters', $data) || in_array($letter, $data)) {
                $options[] = $this->createNewOption($letter, $button);
            }
        }

        error_log('options: '.count($options));

        return $options;
    }

    private function getNumberButtonOptions($data, $button) {
        $options = [];

        foreach(['1','2','3','4','5','6','7','8','9','0'] as $number) {
            if(in_array('all-numbers', $data) || in_array($number, $data)) {
                $options[] = $this->createNewOption($number, $button);
            }
        }

        return $options;
    }

    private function getDirectionButtonOptions($data, $button) {
        $options = [];

        foreach(['forward','back','left','right'] as $direction) {
            if(in_array('all-directions', $data) || in_array($direction, $data)) {
                $options[] = $this->createNewOption($direction, $button);
            }
        }

        return $options;
    }

    private function getSpecialButtonOptions($data, $button) {
        $options = [];

        foreach(['TAB','LSHIFT','SPACE','LCTRL','SHIFT','CTRL'] as $special) {
            if(in_array('all-specials', $data) || in_array($special, $data)) {
                $options[] = $this->createNewOption($special, $button);
            }
        }

        return $options;
    }

    private function getMouseButtonOptions($data, $button) {
        $options = [];

        foreach(['LMB','MMB','RMB'] as $mouse) {
            if(in_array('all-mouse', $data) || in_array($mouse, $data)) {
                $options[] = $this->createNewOption($mouse, $button);
            }
        }

        return $options;
    }

}
