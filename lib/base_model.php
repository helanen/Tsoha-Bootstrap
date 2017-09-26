<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();
      $errors = array_merge($errors, $validator_errors);
      foreach($this->validators as $validator){
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
      $validate_name = 'validate_name';
      $this->{validate_name}();
      $validate_maara = 'validate_maara';
      $this->{validate_maara}();
      $validate_expiry = 'validate_expiry';
      $this->{validate_expiry}();
      $validate_omistaja = 'validate_omistaja';
      $this->{validate_omistaja}();
      $validate_luokka = 'validate_luokka';
      $this->{validate_luokka}();
      $validate_added = 'validate_added';
      $this->{validate_added}();
      $validate_kaytto = 'validate_kaytto';
      $this->{validate_kaytto}();
      $validate_description = 'validate_description';
      $this->{validate_description}();
      }

      return $errors;
    }

  }
