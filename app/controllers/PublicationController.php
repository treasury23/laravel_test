<?php

class PublicationController extends BaseController {

    public function addPublication()
    {

        $obl = Area::find(1);

        return View::make('add_publication')->with(array('obl' => $obl));
    }
}