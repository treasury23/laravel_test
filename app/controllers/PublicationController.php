<?php

class PublicationController extends BaseController {

    public function addPublication()
    {

        $obl = Area::find(1);

        return View::make('add_publication')->with(array('obl' => $obl));
    }

    public function getCities($id)
    {
        //$cities = City::where('area_id', '=', $id)->get();
        $cities = Area::find($id)->cities();
        return Response::json(array('cities' => $cities));
    }
}