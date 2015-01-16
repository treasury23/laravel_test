<?php

class PublicationController extends BaseController {

    public function addPublication()
    {

        $obl = Area::find(1);

        return View::make('add_publication')->with(array('obl' => $obl));
    }

    public function getCities($id)
    {
        $cities = Area::find($id)->cities;
        $html = View::make('select')->with(array('cities' => $cities));
        return Response::json(array('html' => json_encode($html)));
    }
}