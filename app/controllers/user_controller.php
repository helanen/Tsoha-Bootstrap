<?php

class UserController extends BaseController {

    public static function login() {
        View::make('user/login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $kuluttaja = Kuluttaja::authenticate($params['name'], $params['password']);

        if (!$kuluttaja) {
            $errors = array();
            $errors[] = 'Väärä käyttäjätunnus tai salasana!';
            View::make('user/login.html', array('errors' => $errors, 'name' => $params['name']));
        } else {
            $_SESSION['kuluttaja'] = $kuluttaja->id;

            Redirect::to('/kaapit', array('message' => 'Tervetuloa takaisin ' . $kuluttaja->name . '!'));
        }
    }

    public static function logout() {
        $_SESSION['kuluttaja'] = null;
        Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
    }

    public static function register() {
        View::make('/user/register.html');
    }

    public static function save() {
        $params = $_POST;
        $attributes = new Kuluttaja(array(
            'name' => $params['name'],
            'password' => $params['password'],
        ));
        $kuluttaja = new Kuluttaja($attributes);
        $errors = $kuluttaja->errors();
        if (count($errors) == 0) {
            $kuluttaja->save();
            Redirect::to('/login', array('message' => 'Kayttäjä lisätty!'));
        } else {
            View::make('/user/register.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

}
