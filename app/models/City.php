<?php

class City extends Eloquent {

    public function area()
    {
        return $this->belongsTo('Area');
    }

    public function publications()
    {
        return $this->hasMany('Publication');
    }

}