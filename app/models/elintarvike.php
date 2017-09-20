<?php>
class Elintarvike extends BaseModel{

    public $id, $jaakaappi_id, $name, $expiry, $omistaja, $luokka, $added, $kaytto, $description;
    
    public function __construct($attributes){
        parent::__construct($attributes);
    }
    
   //$jauheliha = new Elintarvike(array('id' => 1, 'name' => 'Sika-nauta jauheliha', 'luokka' => 'Herkästi pilaantuvat'));
    
  public static function all(){
    $query = DB::connection()->prepare('SELECT * FROM Elintarvike');
    
    $query->execute();
   
    $rows = $query->fetchAll();
    $elintarvikkeet = array();

    
    foreach($rows as $row){
      
      $elintarvikkeet[] = new Elintarvike(array(
        'id' => $row['id'],
        'jaakaappi_id' => $row['jaakaappi_id'],
        'name' => $row['name'],
        'maara' => $row['maara'],
        'expiry' => $row['expiry'],
        'omistaja' => $row['omistaja'],
        'luokka' => $row['luokka'],
        'added' => $row['added'],
        'kaytto' => $row['kaytto']
        'description' => $row['description']
      ));
    }

    return $games;
  }
  public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Elintarvike WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $elintarvike = new Elintarvike(array(
        'id' => $row['id'],
        'jaakaappi_id' => $row['jaakaappi_id'],
        'name' => $row['name'],
        'maara' => $row['maara'],
        'expiry' => $row['expiry'],
        'omistaja' => $row['omistaja'],
        'luokka' => $row['luokka'],
        'added' => $row['added'],
        'kaytto' => $row['kaytto']
        'description' => $row['description']
      ));

      return $elintarvike;
    }

    return null;
  }
}