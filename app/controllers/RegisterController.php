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

                $password = Hash::make($password);
                //$decrypted = Crypt::decrypt($encryptedValue);

            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->save();
            return Redirect::to('add');
            }
        }
        else{
            return View::make('signup');
        }
    }

    public function showFormLogin()
    {
        if (Request::isMethod('post')) {
            $email = Input::get('email');
            $password = Input::get('password');

            if (Auth::attempt(array('email' => $email, 'password' => $password))) {

                return Redirect::intended('profile');

            }else{
                return Redirect::back()->withInput(Input::except('password'))->withErrors(array('Wrong creadentials!'));
            }

        }else{
            return View::make('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function profile()
    {
        if (Auth::check()) {
            $name = Auth::user()->name;
            $email = Auth::user()->email;
            return View::make('profile')->with(array('name' => $name, 'email' => $email));
        }

    }
}
