<?php

class Publication extends Eloquent {

    public $timestamps = false;

    protected $table = 'publications';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function model()
    {
        return $this->belongsTo('Model');
    }

    public function carImage()
    {
        return $this->hasMany('CarImage');
    }

}