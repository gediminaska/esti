<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Estimate extends Model
{
    public function estimateRequest() {
        return $this->belongsTo('App\EstimateRequest');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
