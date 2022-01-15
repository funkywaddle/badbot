<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Specialcheckboxes extends Component
{
    public $options;

    public function __construct($options) {
        $this->options = $options;
    }

    public function isSelected($special) {
        $selected = in_array($special, $this->options);
        $return = $selected || $this->in_sub_array($special);
        return $return;
    }

    private function in_sub_array($special) {
        foreach($this->options as $option) {
            if($option['option'] == $special) {
                return true;
            }
        }

        return false;
    }

    public function render() {
        return view('components.checkboxes.specials');
    }
}
