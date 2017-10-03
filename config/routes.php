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

$routes->post('/elintarvike', function() {
    ElintarvikeController::store();
});

$routes->get('/elintarvike/new', function() {
    ElintarvikeController::create();
});

$routes->get('/elintarvike/:id', function($id) {
    ElintarvikeController::show($id);
});

$routes->get('/elintarvikelista', function() {
    ElintarvikeController::index();
});

$routes->get('/elintarvike/:id/edit', function($id) {
    ElintarvikeController::edit($id);
});

$routes->post('/elintarvike/:id/edit', function($id) {
    // Pelin muokkaaminen
    ElintarvikeController::update($id);
});

$routes->post('/elintarvike/:id/destroy', function($id) {
    // Pelin poisto
    ElintarvikeController::destroy($id);
});

$routes->get('/login', function() {
    // Kirjautumislomakkeen esittäminen
    UserController::login();
});
$routes->post('/login', function() {
    // Kirjautumisen käsittely
    UserController::handle_login();
});
$routes->post('/logout', function() {
    UserController::logout();
});

$routes->post('/kaapit', function() {
    JaakaappiController::store();
});

$routes->get('/kaapit/new', function() {
    JaakaappiController::create();
});

$routes->get('/kaapit/:id', function($id) {
    JaakaappiController::show($id);
});

$routes->get('/kaapit', function() {
    JaakaappiController::index();
});

$routes->get('/kaapit/:id/edit', function($id) {
    JaakaappiController::edit($id);
});

$routes->post('/kaapit/:id/edit', function($id) {
    // Pelin muokkaaminen
    JaakaappiController::update($id);
});

$routes->post('/kaapit/:id/destroy', function($id) {
    // Pelin poisto
    JaakaappiController::destroy($id);
});

