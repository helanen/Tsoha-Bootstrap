<?php

class Kuluttaja extends BaseModel {

    public $id, $name, $password;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function authenticate($name, $password) {
        $query = DB::connection()->prepare('SELECT * FROM Kuluttaja WHERE name = :name AND password = :password LIMIT 1');
        $query->execute(array('name' => $name, 'password' => $password));
        $row = $query->fetch();
        if ($row) {
            $kuluttaja = new Kuluttaja(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'password' => $row['password'],
            ));
            return $kuluttaja;
            // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
        } else {
            return null;
            // Käyttäjää ei löytynyt, palautetaan null
        }
    }

    //$henkka = new Kuluttaja(array('id' => 1, 'name' => 'Henkka', 'password' => 'asdqwe'));

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Kuluttaja');

        $query->execute();

        $rows = $query->fetchAll();
        $kuluttajat = array();


        foreach ($rows as $row) {

            $kuluttajat[] = new Kuluttaja(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'password' => $row['password']
            ));
        }

        return $kuluttajat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kuluttaja WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $kuluttaja = new Kuluttaja(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'password' => $row['password'],
            ));

            return $kuluttaja;
        }

        return null;
    }

    

}
