<?php

class RegisterController extends BaseController {

    public function showFormRegister()
    {
        if ($this->request->isMethod('post')) {

            $user = new User;
            $user->name = 'vitya';
            $user->email = 'treasury23@gmail.com';
            $user->password = '123456';
            $user->save();

        }

        if ($this->request->isMethod('get')) {
            return View::make('signup');
        }
    }

}
