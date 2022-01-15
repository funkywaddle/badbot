<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Lettercheckboxes extends Component {

    public $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function isSelected($letter) {
        $selected = in_array($letter, $this->options);
        $return = $selected || $this->in_sub_array($letter);
        return $return;
    }

    private function in_sub_array($letter) {
        foreach($this->options as $option) {
            if($option['option'] == $letter) {
                return true;
            }
        }

        return false;
    }

    public function render()
    {
        return view('components.checkboxes.letters');
    }
}
