<?php

class PublicationController extends BaseController {

    public function addPublication()
    {
        if (Request::isMethod('post')) {

            $count = Publication::where('user_id', '=', Auth::user()->id)->count();

            if ($count>=3) {
                return Redirect::to('add')->withInput()->withErrors(array('Вы больше не можете размещать публикации'));
            }

            $engine = Input::get('engine');
            $run = Input::get('run');
            $owner = Input::get('owner');
            $city = Input::get('city_id');
            $model = Input::get('model_id');

            $validator = Validator::make(
                array(
                    'engine' => $engine,
                    'run' => $run,
                    'owner' => $owner,
                    'city_id' => $city,
                    'model_id' => $model

                ),
                array(
                    'engine' => 'required|integer|max:100000',
                    'run' => 'required|integer|max:10000000',
                    'owner' => 'required|integer|max:100',
                    'city_id' => 'required|integer',
                    'model_id' => 'required|integer'
                )
            );

            if ($validator->fails()) {
                return Redirect::to('add')->withInput()->withErrors($validator);

            }else{

                $city = City::find($city);
                $model = Model::find($model);

                if (is_null($city)) {
                    return Redirect::to('add')->withInput()->withErrors(array('Нет такого города'));
                }

                if (is_null($model)) {
                    return Redirect::to('add')->withInput()->withErrors(array('Нет такой модели'));
                }

                $publication = new Publication();
                $publication->engine = $engine;
                $publication->run = $run;
                $publication->owner = $owner;
                $publication->city()->associate($city);
                $publication->model()->associate($model);
                $publication->user()->associate(Auth::user());
                $publication->save();

                return Redirect::to('/');
            }

        }else{

            return View::make('add_publication');
        }
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