<?php

class Brand extends Eloquent {

    public function models()
    {
        return $this->hasMany('Model');
    }

}