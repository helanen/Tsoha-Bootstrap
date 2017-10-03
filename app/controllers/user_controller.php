<?php
class UserController extends BaseController{
  public static function login(){
      View::make('user/login.html');
  }
  public static function handle_login(){
    $params = $_POST;

    $kuluttaja = Kuluttaja::authenticate($params['name'], $params['password']);

    if(!$kuluttaja){
      View::make('user/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'name' => $params['name']));
    }else{
      $_SESSION['kuluttaja'] = $kuluttaja->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $kuluttaja->name . '!'));
    }
  }
  public static function logout(){
    $_SESSION['kuluttaja'] = null;
    Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
  }
}