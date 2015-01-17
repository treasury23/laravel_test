<?php

class Image extends Eloquent {

    public $timestamps = false;

    protected $table = 'images';

    public function publications()
    {
        return $this->belongsTo('Publication');
    }
}