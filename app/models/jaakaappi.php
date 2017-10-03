<?php

class Jaakaappi extends BaseModel {

    public $id, $name;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name');
    }
    
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Jaakaappi (name) VALUES (:name) RETURNING id');
        $query->execute(array('name' => $this->name));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Jaakaappi SET name = :name WHERE id = :id');
        $query->execute(array('name' => $this->name, 'id' => $this->id));
    }
    
    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Jaakaappi WHERE :id = id');
        $query->execute(array('id' => $this->id));
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Jaakaappi');

        $query->execute();

        $rows = $query->fetchAll();
        $jaakaapit = array();


        foreach ($rows as $row) {

            $jaakaapit[] = new Jaakaappi(array(
                'id' => $row['id'],
                'name' => $row['name'],
            ));
        }

        return $jaakaapit;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Jaakaappi WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $jaakaappi = new Jaakaappi(array(
                'id' => $row['id'],
                'name' => $row['name'],
            ));

            return $jaakaappi;
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

    

}
