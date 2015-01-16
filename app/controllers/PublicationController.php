<?php

class PublicationController extends BaseController {

    public function addPublication()
    {

        $obl = Area::find(1);

        return View::make('add_publication')->with(array('obl' => $obl));
    }

    public function getCities($id)
    {
        $options = Area::find($id)->cities;
        $html = View::make('select_options')->with(array('options' => $options, 'default_option'=> 'Выберите город'))->render();
        return Response::json(array('html' => $html));
    }

    public function getModels($id)
    {
        $options = Brand::find($id)->models;
        $html = View::make('select_options')->with(array('options' => $options, 'default_option'=> 'Выберите модель'))->render();
        return Response::json(array('html' => $html));
    }
}