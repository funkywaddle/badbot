<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Directioncheckboxes extends Component
{
    public $options;

    public function __construct($options) {
        $this->options = $options;
    }

    public function isSelected($direction) {
        $selected = in_array($direction, $this->options);
        $return = $selected || $this->in_sub_array($direction);
        return $return;
    }

    private function in_sub_array($direction) {
        foreach($this->options as $option) {
            if($option['option'] == $direction) {
                return true;
            }
        }

        return false;
    }

    public function render() {
        return view('components.checkboxes.directions');
    }
}
