<?php

class Kuluttaja extends BaseModel {

    public $id, $name, $password;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_password');
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

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kuluttaja (name, password) VALUES (:name, :password)');
        $query->execute(array('name' => $this->name, 'password' => $this->password));
    }

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

    public function validate_name() {
        $errors = array();
        if ($this->name == '' || $this->name == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        if (strlen($this->name) < 3) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
        }
        if (strlen($this->name) > 20) {
            $errors[] = 'Nimen pituuden tulee olla enintään 20 merkkiä!';
        }

        return $errors;
    }

    public function validate_password() {
        $errors = array();
        if ($this->password == '' || $this->password == null) {
            $errors[] = 'Salasana ei saa olla tyhjä!';
        }
        if (strlen($this->password) < 3) {
            $errors[] = 'Salasanan pituuden tulee olla vähintään kolme merkkiä!';
        }
        if (strlen($this->password) > 30) {
            $errors[] = 'Salasanan pituuden tulee olla enintään 30 merkkiä!';
        }

        return $errors;
    }

}
