<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }
    public static function elintarvikelista(){
        View::make('suunnitelmat/elintarvikelista.html');
    }
    public static function elintarvikeShow(){
        View::make('suunnitelmat/elintarvike_show.html');
    }
    public static function elintarvikeMuokkaus(){
        View::make('suunnitelmat/elintarvike_muokkaus.html');
    }
    public static function kirjautuminen(){
        View::make('suunnitelmat/kirjautuminen.html');
    }
    public static function etusivu(){
        View::make('suunnitelmat/etusivu.html');
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }
  }
