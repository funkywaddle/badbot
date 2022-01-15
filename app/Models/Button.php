<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Button extends Model {

    public $timestamps = false;

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    public function currency() {
        return $this->belongsTo('App\Models\Currency');
    }
    public function options() {
        return $this->hasMany('App\Models\ButtonOptions');
    }
}
