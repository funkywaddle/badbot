<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {

    public $timestamps = false;

    public function get($name) {
        return $this->where('key', $name)->first()->value;
    }

}
