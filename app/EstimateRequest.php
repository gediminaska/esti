<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EstimateRequest extends Model
{
    public function estimates() {
        return $this->hasMany('App\Estimate');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
