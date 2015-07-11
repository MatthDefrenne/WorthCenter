<?php

require_once 'libs/Slim/Slim.php';
require 'libs/Slim/Middleware.php';
require 'controller/indexController.php';
require 'controller/connexionController.php';
require 'controller/membreController.php';
require 'controller/projetsController.php';
require 'controller/conceptController.php';
require 'controller/formulesController.php';
require 'controller/inscriptionController.php';
require_once 'middleware/authMiddleware.php';
require 'class/flash.php';
require 'libs/ORM/rb.php';
require 'class/user.php';
require 'class/userManager.php';


R::setup( 'mysql:host=localhost;dbname=website',
    'root', '' );

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim([
	'templates.path' => 'views'
]);

$app->add(new authMiddleware());
$app->get('/', function () use ($app) {
    indexController::index();
});
$app->get('/concept', function () use ($app) {
	conceptController::concept();
});
$app->get('/formules', function () use ($app) {
	formulesController::formules();
});
$app->get('/projets', function () use ($app) {
	projetsController::projets();
});
$app->get('/contact', function () use ($app) {
	contactController::contact();
});
$app->get('/connexion', function () use ($app) {
	connexionController::index();
});
$app->post('/connexion', function () use ($app) {
    connexionController::connexion();
});
$app->get('/inscription', function () use ($app) {
	inscriptionController::index();
});
$app->post('/inscription', function () use ($app) {
    inscriptionController::subscribe();
});
$app->get('/compte', function () use ($app) {
});
$app->get('/membre', function () use ($app) {
    membreController::index();
});

$app->render('header.php');
$app->render('navigation.php');

$app->run();

$app->render('footer.php');