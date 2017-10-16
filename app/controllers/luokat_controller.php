<?php

class LuokkaController extends BaseController {

    public static function index() {
        self::check_logged_in();
        $luokat = Luokka::all();
        View::make('luokat/index.html', array('luokat' => $luokat));
       
    }

    public static function show($id) {
        self::check_logged_in();
        $luokka = Luokka::find($id);
        //$elintarvikkeet = Elintarvike::findByJaakaappiAndLuokka($id);
        //View::make('kaapit/jaakaappi_show.html', array('jaakaappi' => $jaakaappi, 'elintarvikkeet' =>$elintarvikkeet));
        View::make('luokat/luokka_show.html', array('luokka' => $luokka));
    }
    
    public static function store() {
        self::check_logged_in();
        $params = $_POST;
        $attributes = array(
            'name' => $params['name'],
        );

        $luokka = new Luokka($attributes);
        $errors = $luokka->errors();

        if (count($errors) == 0) {

            $luokka->save();
            Redirect::to('/luokat/' . $luokka->id, array('message' => 'Luokka on lisätty listaasi!'));
        } else {
            View::make('luokat/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function create() {
        self::check_logged_in();
        View::make('luokat/new.html');
    }


    public static function edit($id) {
        self::check_logged_in();
        $luokka = Luokka::find($id);
        View::make('luokat/luokka_muokkaus.html', array('luokka' => $luokka));
    }

    public static function update($id) {
        self::check_logged_in();
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'name' => $params['name'],
        );


        $luokka = new Luokka($attributes);
        $errors = $luokka->errors();

        if (count($errors) > 0) {
            View::make('luokat/luokka_muokkaus.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {

            $luokka->update();

            Redirect::to('/luokat/' . $luokka->id, array('message' => 'Luokkaa on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();

        $luokka = new Luokka(array('id' => $id));

        $luokka->destroy();


        Redirect::to('/luokat', array('message' => 'Luokka on poistettu onnistuneesti!'));
    }
    

}
