<?php

class BaseController {

    public static function get_user_logged_in() {
        // Toteuta kirjautuneen käyttäjän haku tähän
        if (isset($_SESSION['kuluttaja'])) {
            $kuluttaja_id = $_SESSION['kuluttaja'];
            $kuluttaja = Kuluttaja::find($kuluttaja_id);
            return $kuluttaja;
        }
        return null;
    }

    public static function check_logged_in() {
        // Toteuta kirjautumisen tarkistus tähän.
        // Jos käyttäjä ei ole kirjautunut sisään, ohjaa hänet toiselle sivulle (esim. kirjautumissivulle).
        if(!isset($_SESSION['kuluttaja'])){
            Redirect::to('/login', array('message' => 'Kirjaudu ensin sisään!'));
        }
    }
   
    }


