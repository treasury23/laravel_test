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
        $area = Input::get('area_id');
        $city = Input::get('city_id');
        $brand = Input::get('brand_id');
        $model = Input::get('model_id');
        $engine_from = Input::get('engine_from');
        $engine_to = Input::get('engine_to');
        $run_from = Input::get('run_from');
        $run_to = Input::get('run_to');
        $owner_from = Input::get('owner_from');
        $owner_to = Input::get('owner_to');

        $cities_id = [];
        $models_id = [];

        $areas = Area::find($area);
        if($areas){$cities = $areas->cities;
            foreach($cities as $item){
                $cities_id[] = $item->id;
            }
        }

        $brands = Brand::find($brand);
        if($brands){$models = $brands->models;
            foreach($models as $item){
                $models_id[] = $item->id;
            }
        }

        $matchThese = [];

        if ($city){$matchThese['city_id'] = $city;}
        if ($model){$matchThese['model_id'] = $model;}

        $query = Publication::where($matchThese);

        if ($cities_id){$query->whereIn('city_id', $cities_id);}
        if ($models_id){$query->whereIn('model_id', $models_id);}

        if ($run_from and $run_to){$query->whereBetween('run', array($run_from, $run_to));}
        if ($engine_from and $engine_to){$query->whereBetween('engine', array($engine_from, $engine_to));}
        if ($owner_from and $owner_to){$query->whereBetween('owner', array($owner_from, $owner_to));}

        $publications = $query->get();

        $html = View::make('search')->with(array('publications' => $publications))->render();
        return Response::json(array('html' => $html));
    }
}
