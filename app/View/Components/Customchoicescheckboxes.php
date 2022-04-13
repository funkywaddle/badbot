<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Customchoicescheckboxes extends Component
{
    public $options;

    public function __construct($options) {
        $this->options = $options;
    }

    public function isSelected($custom_choice) {
        $return = false;
        if(!empty($custom_choice)) {
            $selected = in_array($custom_choice, $this->options);
            $return = $selected || $this->in_sub_array($custom_choice);
        }
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
        return view('components.checkboxes.custom');
    }
}
