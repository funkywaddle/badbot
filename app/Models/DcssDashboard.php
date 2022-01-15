<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DcssDashboard extends Model
{
    protected $table = 'dcss_dashboard';
    public $timestamps = false;

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
