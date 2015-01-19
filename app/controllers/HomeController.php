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
        //$area = Input::get('area_id');
        $city = Input::get('city_id');
        //$brand = Input::get('brand_id');
        $model = Input::get('model_id');
        //$engine_from = Input::get('engine_from');
        //$engine_to = Input::get('engine_to');
        $run_from = Input::get('run_form');
        $run_to = Input::get('run_to');
        //$owner_from = Input::get('owner_from');
        //$owner_to = Input::get('owner_to');

        //$area = Area::find(Input::get('area_id'));
        //$city = City::find(Input::get('city_id'));
        //$model = Model::find($model);



        //$publications = DB::table('publications')
        //    ->where('votes', '>', 100)
        //    ->where('name', 'Джон')
        //    ->whereBetween('run', array($run_from, $run_to))
         //   ->orderBy('name', 'desc')
        //    ->get();

        //$publications = Publication::all();
        $matchThese = ['city_id' => $city, 'model_id' => $model];
        $publications = Publication::where(['city_id' => $city, 'model_id' => $model])->get();



        $html = View::make('search')->with(array('publications' => $publications))->render();
        return Response::json(array('html' => $html));
    }

}
