<?php

class JaakaappiController extends BaseController {

    public static function index() {
        self::check_logged_in();
        $jaakaapit = Jaakaappi::all();
        View::make('kaapit/index.html', array('jaakaapit' => $jaakaapit));
       
    }

    public static function show($id) {
        self::check_logged_in();
        $jaakaappi = Jaakaappi::find($id);
        $elintarvikkeet = Elintarvike::findByJaakaappi($id);
        /*Kint::dump($elintarvikkeet);
        Kint::dump($jaakaappi);
        die();*/
        View::make('kaapit/jaakaappi_show.html', array('jaakaappi' => $jaakaappi, 'elintarvikkeet' =>$elintarvikkeet));
    }
    
    public static function store() {
        self::check_logged_in();
        $params = $_POST;
        $attributes = array(
            'name' => $params['name'],
        );

        $jaakaappi = new Jaakaappi($attributes);
        $errors = $jaakaappi->errors();

        if (count($errors) == 0) {

            $jaakaappi->save();
            Redirect::to('/kaapit/' . $jaakaappi->id, array('message' => 'Jääkaappi on lisätty listaasi!'));
        } else {
            View::make('kaapit/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function create() {
        self::check_logged_in();
        View::make('kaapit/new.html');
    }


    public static function edit($id) {
        self::check_logged_in();
        $jaakaappi = Jaakaappi::find($id);
        View::make('kaapit/jaakaappi_muokkaus.html', array('jaakaappi' => $jaakaappi));
    }

    public static function update($id) {
        self::check_logged_in();
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'name' => $params['name'],
        );


        $jaakaappi = new Jaakaappi($attributes);
        $errors = $jaakaappi->errors();

        if (count($errors) > 0) {
            View::make('kaapit/jaakaappi_muokkaus.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {

            $jaakaappi->update();

            Redirect::to('/kaapit/' . $jaakaappi->id, array('message' => 'Jääkaappia on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();

        $jaakaappi = new Jaakaappi(array('id' => $id));

        $jaakaappi->destroy();


        Redirect::to('/', array('message' => 'Jaakaappi on poistettu onnistuneesti!'));
    }
    

}
