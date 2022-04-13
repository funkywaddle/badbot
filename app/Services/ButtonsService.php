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
    private $letters_array = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    private $numbers_array = ['1','2','3','4','5','6','7','8','9','0'];
    private $directions_array = ['forward','back','left','right'];
    private $specials_array = ['TAB','LSHIFT','SPACE','LCTRL','SHIFT','CTRL'];
    private $mouse_array = ['LMB','MMB','RMB'];

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

    public function getCustomOptions($id) {
        if($id > 0){
            $btn = $this->getSingleById($id);
        } else {
            $btn = $this->model->newInstance();
        }

        $options = (array) $btn->options->toArray();
        $empty = $this->getEmptyOptionsArray();
        $customs = [];

        foreach($options as $option){
            if($option['custom'] == 1) {
                $customs[] = $option;
            }
        }
        for($i=count($customs); $i < 50; $i++) {
                $customs[] = $empty[$i];
        }

        return $customs;
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

    public function getEmptyOptionsArray() {
        $custom_format  = [
            'id'=>'',
            'button_id'=>'',
            'option'=>'',
            'custom'=>''
        ];

        $custom = [];

        for($i=0; $i < 50; $i++) {
            $custom[] = $custom_format;
        }

        return $custom;
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
            $this->getCustomButtonOptions($data['options'], $button);
        }
    }

    private function createNewOption($item, Button $button, $custom) {
        $tmp = new ButtonOptions();
        $tmp->option = $item;
        $tmp->custom = $custom;
        $button->options()->save($tmp);
        return $tmp;
    }

    private function getLetterButtonOptions($data, $button) {
        $options = [];

        error_log(print_r($data, 1));

        foreach($this->letters_array as $letter) {
            if(in_array('all-letters', $data) || in_array($letter, $data)) {
                $options[] = $this->createNewOption($letter, $button, false);
            }
        }

        error_log('options: '.count($options));

        return $options;
    }

    private function getNumberButtonOptions($data, $button) {
        $options = [];

        foreach($this->numbers_array as $number) {
            if(in_array('all-numbers', $data) || in_array($number, $data)) {
                $options[] = $this->createNewOption($number, $button, false);
            }
        }

        return $options;
    }

    private function getDirectionButtonOptions($data, $button) {
        $options = [];

        foreach($this->directions_array as $direction) {
            if(in_array('all-directions', $data) || in_array($direction, $data)) {
                $options[] = $this->createNewOption($direction, $button, false);
            }
        }

        return $options;
    }

    private function getSpecialButtonOptions($data, $button) {
        $options = [];

        foreach($this->specials_array as $special) {
            if(in_array('all-specials', $data) || in_array($special, $data)) {
                $options[] = $this->createNewOption($special, $button, false);
            }
        }

        return $options;
    }

    private function getMouseButtonOptions($data, $button) {
        $options = [];

        foreach($this->mouse_array as $mouse) {
            if(in_array('all-mouse', $data) || in_array($mouse, $data)) {
                $options[] = $this->createNewOption($mouse, $button, false);
            }
        }

        return $options;
    }

    private function getCustomButtonOptions($data, $button) {
        $all_array = array_merge(
            $this->letters_array,
            $this->numbers_array,
            $this->directions_array,
            $this->specials_array,
            $this->mouse_array
        );

        $customs = array_diff($data, $all_array);

        $options = [];

        foreach($customs as $custom) {
                $options[] = $this->createNewOption($custom, $button, true);
        }

        return $options;
    }
}
