<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/etusivu', function() {
    HelloWorldController::etusivu();
  });
  
   $routes->get('/kirjautuminen', function() {
    HelloWorldController::kirjautuminen();
  });
  
  $routes->get('/elintarvikelista', function() {
    HelloWorldController::elintarvikelista();
  });
  
  $routes->get('/elintarvikelista/tiedot', function() {
    HelloWorldController::elintarvikeShow();
  });
  
  $routes->get('/elintarvikelista/tiedot/muokkaus', function() {
    HelloWorldController::elintarvikeMuokkaus();
  });
