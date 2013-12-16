<?php

class MainController extends BaseController {

    public function getIndex() {
        return View::make('base.index');
    }

    public function postLogin() {
        Auth::attempt(array('email' => Input::get("username"), 'password' => Input::get("password")));
        if (Auth::user()) {
            return Redirect::to('me/index');
        } else {
            return Redirect::to('index');
        }
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to("index");
    }

    public function postSignUp() {
        $u = new User;
        $u->last_name = Input::get("last_name");
        $u->first_name = Input::get("first_name");
        $u->email = Input::get("email");
        $u->description = Input::get("description");
        $u->birthdate = Input::get("birthdate");
        $u->address = Input::get("address");
        $u->x = Input::get("x");
        $u->y = Input::get("y");
        $u->gender = Input::get("gender");
        $u->password = Hash::make(Input::get("password"));
        $u->save();
        
        
        if (Input::hasFile('picture')) {
            Input::file('picture')->move(public_path() . "/users/picture", "picture_" . $u->id . "." . Input::file('picture')->getClientOriginalExtension());
            $u->picture = "picture_" . $u->id . "." . Input::file('picture')->getClientOriginalExtension();
        }
        $u->save();

        return Redirect::to("me/index");
    }

}
