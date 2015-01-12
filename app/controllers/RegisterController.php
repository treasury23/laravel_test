<?php

class RegisterController extends BaseController {

    public function showFormRegister()
    {
        if (Request::isMethod('post')) {

            $user = new User;
            $user->name = 'vitya';
            $user->email = 'treasury23@gmail.com';
            $user->password = '123456';
            $user->save();
            return 'SUCCESS';
        }
        else{
            return View::make('signup');
        }
    }

}
