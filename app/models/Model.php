<?php

class Model extends Eloquent {

    public function brand()
    {
        return $this->belongsTo('Brand');
    }

}