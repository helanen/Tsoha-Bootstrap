<?php>

class ElintarvikeController extends BaseController{
    public static function index(){
        $elintarvikkeet = Elintarvike::all();
        View::make('elintarvike/index.html', array('elintarvikkeet' => $elintarvikkeet));
    }
}