<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model {

    public $timestamps = false;

    public function buttons() {
        return $this->hasMany('App\Models\Button');
    }
}
