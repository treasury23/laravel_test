<?php

class HomeController extends BaseController {

	public function showPublication()
	{
        $areas = array('' => 'Выберите область');
        foreach (Area::get(array('id', 'name')) as $area) {
            $areas[$area->id] = $area->name;
        }

        $brands = array('' => 'Выберите марку');
        foreach (Brand::get(array('id', 'name')) as $brand) {
            $brands[$brand->id] = $brand->name;
        }

        $cities = array('' => 'Выберите город');
        $models = array('' => 'Выберите модель');

        return View::make('home')->with(array('areas' => $areas, 'cities' => $cities, 'brands' => $brands, 'models' => $models));;
    }

    public function search()
    {
        $publications = Publication::all();

        $html = View::make('search')->with(array('publications' => $publications))->render();
        return Response::json(array('html' => $html));
    }

}
