<?php
  class HelloWorldController extends BaseController{

   /* public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('suunnitelmat/etusivu.html');
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
    }*/
  

    public static function sandbox(){
      //View::make('helloworld.html');
      $henkka = Kuluttaja::find(1);
      $kuluttajat = Kuluttaja::all();
    // Kint-luokan dump-metodi tulostaa muuttujan arvon
      Kint::dump($kuluttajat);
      Kint::dump($henkka);
      
      $doom = new Game(array(
        'name' => 'd',
        'published' => 'eilen',
        'publisher' => 'id Software',
        'description' => 'Boom, boom!'
      ));
      $errors = $doom->errors();

        Kint::dump($errors);
    }
    }
 
