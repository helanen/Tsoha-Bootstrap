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
        $attributes = array(
            'name' => $params['name'],
            'maara' => $params['maara'],
            'expiry' => $params['expiry'],
            'omistaja' => $params['omistaja'],
            'luokka' => $params['luokka'],
            'added' => $params['added'],
            'kaytto' => $params['kaytto'],
            'description' => $params['description']
        ));
        
        $elintarvike = new Elintarvike($attributes);
        $errors = $elintarvike->errors();
        
        if(count($errors) == 0){
        
        $elintarvike->save();
        Redirect::to('/elintarvike/' . $elintarvike->id, array('message' => 'Elintarvike on lisätty jääkaappiisi!'));
        
        }else{
            View::make('elintarvike/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
       
    }
    public static function edit($id){
    $elintarvike = Elintarvike::find($id);
    View::make('elintarvike/edit.html', array('attributes' => $elintarvike));
  }
    public static function update($id){
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

    if(count($errors) > 0){
      View::make('elintarvike/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
    
      $game->update();

      Redirect::to('/elintarvike/' . $elintarvike->id, array('message' => 'Elintarviketta on muokattu onnistuneesti!'));
    }
  }
  public static function destroy($id){
    
    $elintarvike = new Elintarvike(array('id' => $id));
    
    $elintarvike->destroy();

    
    Redirect::to('/elintarvike', array('message' => 'Elintarvike on poistettu onnistuneesti!'));
  }
}