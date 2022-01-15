<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Mousecheckboxes extends Component
{
    public $options;

    public function __construct($options) {
        $this->options = $options;
    }

    public function isSelected($mouse) {
        $selected = in_array($mouse, $this->options);
        $return = $selected || $this->in_sub_array($mouse);
        return $return;
    }

    private function in_sub_array($mouse) {
        foreach($this->options as $option) {
            if($option['option'] == $mouse) {
                return true;
            }
        }

        return false;
    }

    public function render() {
        return view('components.checkboxes.mouse');
    }
}
