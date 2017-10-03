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
        $attributes = array(
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

        if (count($errors) == 0) {

            $elintarvike->save();
            Redirect::to('/elintarvike/' . $elintarvike->id, array('message' => 'Elintarvike on lisätty jääkaappiisi!'));
        } else {
            View::make('elintarvike/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function create() {
        self::check_logged_in();
        View::make('elintarvike/new.html');
    }


    public static function edit($id) {
        self::check_logged_in();
        $elintarvike = Elintarvike::find($id);
        View::make('elintarvike/elintarvike_muokkaus.html', array('elintarvike' => $elintarvike));
    }

    public static function update($id) {
        self::check_logged_in();
        $params = $_POST;

        $attributes = array(
            'id' => $id,
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
