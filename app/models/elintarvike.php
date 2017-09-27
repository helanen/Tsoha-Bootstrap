<?php

class Elintarvike extends BaseModel {

    public $id, $jaakaappi_id, $name, $maara, $expiry, $omistaja, $luokka, $added, $kaytto, $description;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_maara', 'validate_expiry', 'validate_omistaja', 'validate_luokka', 'validate_added', 'validate_kaytto', 'validate_description');
    }

    //$jauheliha = new Elintarvike(array('id' => 1, 'name' => 'Sika-nauta jauheliha', 'luokka' => 'Herkästi pilaantuvat'));
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Elintarvike (name, maara, expiry, omistaja, luokka, added, kaytto, description) VALUES (:name, :maara, :expiry, :omistaja, :luokka, :added, :kaytto, :description) RETURNING id');
        $query->execute(array('name' => $this->name, 'maara' => $this->maara, 'expiry' => $this->expiry, 'omistaja' => $this->omistaja, 'luokka' => $this->luokka, 'added' => $this->added, 'kaytto' => $this->kaytto, 'description' => $this->description));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Elintarvike SET name = :name, maara = :maara, expiry = :expiry, omistaja = :omistaja, luokka = :luokka, added = :added, kaytto = :kaytto, description = :description WHERE id = :id');
        $query->execute(array('name' => $this->name, 'maara' => $this->maara, 'expiry' => $this->expiry, 'omistaja' => $this->omistaja, 'luokka' => $this->luokka, 'added' => $this->added, 'kaytto' => $this->kaytto, 'description' => $this->description, 'id' => $this->id));
    }
    
    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Elintarvike WHERE :id = id');
        $query->execute(array('id' => $this->id));
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Elintarvike');

        $query->execute();

        $rows = $query->fetchAll();
        $elintarvikkeet = array();


        foreach ($rows as $row) {

            $elintarvikkeet[] = new Elintarvike(array(
                'id' => $row['id'],
                'jaakaappi_id' => $row['jaakaappi_id'],
                'name' => $row['name'],
                'maara' => $row['maara'],
                'expiry' => $row['expiry'],
                'omistaja' => $row['omistaja'],
                'luokka' => $row['luokka'],
                'added' => $row['added'],
                'kaytto' => $row['kaytto'],
                'description' => $row['description']
            ));
        }

        return $elintarvikkeet;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Elintarvike WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $elintarvike = new Elintarvike(array(
                'id' => $row['id'],
                'jaakaappi_id' => $row['jaakaappi_id'],
                'name' => $row['name'],
                'maara' => $row['maara'],
                'expiry' => $row['expiry'],
                'omistaja' => $row['omistaja'],
                'luokka' => $row['luokka'],
                'added' => $row['added'],
                'kaytto' => $row['kaytto'],
                'description' => $row['description']
            ));

            return $elintarvike;
        }
        return null;
    }

    public function validate_name() {
        $errors = array();
        if ($this->name == '' || $this->name == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        if (strlen($this->name) < 3) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
        }
        if (strlen($this->name) > 50) {
            $errors[] = 'Nimen pituuden tulee olla enintään 50 merkkiä!';
        }

        return $errors;
    }

    public function validate_maara() {
        $errors = array();
        if (strlen($this->maara) > 20) {
            $errors[] = 'Määrän nimi tulee olla enintään 20 merkkiä!';
        }

        return $errors;
    }

    public function validate_expiry() {
        $errors = array();
        /* if($this->name == '' || $this->name == null){
          $errors[] = 'Nimi ei saa olla tyhjä!';
          }
          if(strlen($this->name) < 3){
          $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
          }
          if(strlen($this->name) > 50){
          $errors[] = 'Nimen pituuden tulee olla enintään 50 merkkiä!';
          } */

        return $errors;
    }

    public function validate_omistaja() {
        $errors = array();
        if (strlen($this->omistaja) > 20) {
            $errors[] = 'Omistajan nimi tulee olla enintään 20 merkkiä!';
        }

        return $errors;
    }

    public function validate_luokka() {
        $errors = array();
        if (strlen($this->luokka) > 20) {
            $errors[] = 'Luokan nimi tulee olla enintään 20 merkkiä!';
        }

        return $errors;
    }

    public function validate_added() {
        $errors = array();
        /* if(strlen($this->name) > 20){
          $errors[] = 'Määrän nimi tulee olla enintään 20 merkkiä!';
          } */

        return $errors;
    }

    public function validate_kaytto() {
        $errors = array();
        if (strlen($this->kaytto) > 20) {
            $errors[] = 'Käyttötarkoitus tulee olla enintään 20 merkkiä pitkä!';
        }

        return $errors;
    }

    public function validate_description() {
        $errors = array();
        if (strlen($this->description) > 400) {
            $errors[] = 'Lisätietokentän maksimipituus on 400 merkkiä!';
        }

        return $errors;
    }

}
