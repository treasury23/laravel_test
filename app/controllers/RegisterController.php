<?php

class RegisterController extends BaseController {

    public function showFormRegister()
    {
        if (Request::isMethod('post')) {

            $name = Input::get('name');
            $email = Input::get('email');
            $password = Input::get('password');

            $validator = Validator::make(
                array(
                    'name' => $name,
                    'email' => $email,
                    'password' => $password
                ),
                array(
                    'name' => 'required',
                    'password' => 'required|min:8',
                    'email' => 'required|email|unique:users'
                )
            );

            if ($validator->fails()) {
                return Redirect::to('signup')->withInput()->withErrors($validator);

            }else{

            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->save();
            return 'SUCCESS';
            }
        }
        else{
            return View::make('signup');
        }
    }

}
