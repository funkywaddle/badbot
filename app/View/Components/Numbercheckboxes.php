<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Numbercheckboxes extends Component
{
    public $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function isSelected($number) {
        $selected = in_array($number, $this->options);
        $return = $selected || $this->in_sub_array($number);
        return $return;
    }

    private function in_sub_array($number) {
        foreach($this->options as $option) {
            if($option['option'] == $number) {
                return true;
            }
        }

        return false;
    }

    public function render()
    {
        return view('components.checkboxes.numbers');
    }
}
