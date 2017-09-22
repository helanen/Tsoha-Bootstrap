<?php

  $routes->get('/', function() {
    ElintarvikeController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/etusivu', function() {
    ElintarvikeController::etusivu();
  });
  
   $routes->get('/kirjautuminen', function() {
    ElintarvikeController::kirjautuminen();
  });
  
  $routes->post('/elintarvike', function() {
    ElintarvikeController::store();
  });
  
  $routes->get('/elintarvike/new', function() {
    ElintarvikeController::create();
  });
  
  $routes->get('/elintarvikelista', function() {
    ElintarvikeController::index();
  });
  
  $routes->get('/elintarvike/:id', function($id) {
    ElintarvikeController::show($id);
  });
  
  $routes->get('/elintarvike/muokkaus', function() {
    ElintarvikeController::elintarvikeMuokkaus();
  });
