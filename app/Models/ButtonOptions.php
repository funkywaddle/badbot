<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ButtonOptions extends Model
{
    protected $table = 'button_options';
    public $timestamps = false;
    public $fillable = ['option'];

    public function button() {
        return $this->belongsTo('App\Models\Button');
    }
}
