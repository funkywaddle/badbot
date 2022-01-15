<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    public $timestamps = false;

    public function buttons() {
        return $this->hasMany('App\Models\Button');
    }

    public function dashboard_css() {
        return $this->hasOne('App\Models\DcssDashboard');
    }
}
