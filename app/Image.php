<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    protected $fillable = ['name', 'estimate_request_id', 'estimate_id'];

    public function estimateRequest() {
        return $this->belongsTo('App\EstimateRequest');
    }

    public function estimate() {
        return $this->belongsTo('App\Estimate');
    }

}
