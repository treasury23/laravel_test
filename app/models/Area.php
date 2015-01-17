<?php

class Area extends Eloquent {

    public function cities()
    {
        return $this->hasMany('City');
    }

}