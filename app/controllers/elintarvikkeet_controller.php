<?php>

class ElintarvikeController extends BaseController{
    
    public static function index(){
        $elintarvikkeet = Elintarvike::all();
        View::make('elintarvike/index.html', array('elintarvikkeet' => $elintarvikkeet));
    }
    
    public static function kirjautuminen(){
        View::make('suunnitelmat/kirjautuminen.html');
    }
    
    public static function elintarvikeMuokkaus(){
        View::make('suunnitelmat/elintarvike_muokkaus.html');
    }
    
    public static function elintarvikeShow(){
        View::make('suunnitelmat/elintarvike_show.html');
    }
    
    public static function etusivu(){
        View::make('suunnitelmat/etusivu.html');
    }
    
    public static function store(){
        $params = $_POST;
        $elintarvike = new Elintarvike(array(
            'name' => $params['name'],
            'maara' => $params['maara'],
            'expiry' => $params['expiry'],
            'omistaja' => $params['omistaja'],
            'luokka' => $params['luokka'],
            'added' => $params['added'],
            'kaytto' => $params['kaytto'],
            'description' => $params['description']
        ));
        
        $game->save();
        
        Redirect::to('/elintarvike/' . $elintarvike->id, array('message' => 'Elintarvike on lisätty jääkaappiisi!'));
    }
}