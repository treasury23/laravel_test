<?php

class Model extends Eloquent {

    public function brand()
    {
        return $this->belongsTo('Brand');
    }

    public function publications()
    {
        return $this->hasMany('Publication');
    }

}