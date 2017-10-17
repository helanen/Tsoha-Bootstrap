<?php

class ElintarvikeController extends BaseController {

    public static function index() {
        self::check_logged_in();
        $elintarvikkeet = Elintarvike::all();
        View::make('elintarvike/index.html', array('elintarvikkeet' => $elintarvikkeet));
       
    }

    public static function show($id) {
        self::check_logged_in();
        $elintarvike = Elintarvike::find($id);
        View::make('elintarvike/elintarvike_show.html', array('elintarvike' => $elintarvike));
    }
    
    public static function store() {
        self::check_logged_in();
        $params = $_POST;
        $jaakaappi = $params['jaakaappi_id'];
        $attributes = array(
            'name' => $params['name'],
            'jaakaappi_id' => $jaakaappi,
            'maara' => $params['maara'],
            'expiry' => $params['expiry'],
            'omistaja' => $params['omistaja'],
            'luokka' => $params['luokka'],
            'added' => $params['added'],
            'kaytto' => $params['kaytto'],
            'description' => $params['description']
        );
        $elintarvike = new Elintarvike($attributes);
        $errors = $elintarvike->errors();
        if (count($errors) == 0) {
            $elintarvike->save();
            Redirect::to('/elintarvike/' . $elintarvike->id, array('message' => 'Elintarvike on lisätty jääkaappiisi!'));
        } else {
            $jaakaapit = Jaakaappi::all();
            View::make('elintarvike/new.html', array('errors' => $errors, 'attributes' => $attributes, 'jaakaapit' => $jaakaapit));
        }
    }

    public static function create() {
        self::check_logged_in();
        $jaakaapit = Jaakaappi::all();
        View::make('elintarvike/new.html', array('jaakaapit' => $jaakaapit));
    }


    public static function edit($id) {
        self::check_logged_in();
        $elintarvike = Elintarvike::find($id);
        View::make('elintarvike/elintarvike_muokkaus.html', array('elintarvike' => $elintarvike));
    }

    public static function update($id) {
        self::check_logged_in();
        $params = $_POST;
        //$jaakaappi = $params['jaakaappi_id'];

        $attributes = array(
            'id' => $id,
            //'jaakaappi_id' => $jaakaappi,
            'name' => $params['name'],
            'maara' => $params['maara'],
            'expiry' => $params['expiry'],
            'omistaja' => $params['omistaja'],
            'luokka' => $params['luokka'],
            'added' => $params['added'],
            'kaytto' => $params['kaytto'],
            'description' => $params['description']
        );


        $elintarvike = new Elintarvike($attributes);
        $errors = $elintarvike->errors();

        if (count($errors) > 0) {
            View::make('elintarvike/elintarvike_muokkaus.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {

            $elintarvike->update();

            Redirect::to('/elintarvike/' . $elintarvike->id, array('message' => 'Elintarviketta on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();

        $elintarvike = new Elintarvike(array('id' => $id));

        $elintarvike->destroy();


        Redirect::to('/', array('message' => 'Elintarvike on poistettu onnistuneesti!'));
    }
    

}
