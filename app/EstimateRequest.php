<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EstimateRequest extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];

    public function estimates() {
        return $this->hasMany('App\Estimate');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function images() {
        return $this->hasMany('App\Image');
    }

}
