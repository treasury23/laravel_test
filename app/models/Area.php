<?php

class Area extends Eloquent {

    public function сities()
    {
        return $this->hasMany('City');
    }

}