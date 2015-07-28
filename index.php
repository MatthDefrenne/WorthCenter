<?php
require_once 'libs/Slim/Slim.php';
require 'libs/Slim/Middleware.php';
require 'controller/indexController.php';
require 'controller/connexionController.php';
require 'controller/projetsController.php';
require 'controller/contactController.php';
require 'controller/conceptController.php';
require 'controller/friendsController.php';
require 'controller/adminController.php';
require 'controller/profilController.php';
require 'controller/messageController.php';
require 'controller/formulesController.php';
require 'controller/membreController.php';
require 'controller/inscriptionController.php';
require_once 'middleware/authMiddleware.php';
require 'class/flash.php';
require 'libs/ORM/rb.php';
require 'class/user.php';
require 'class/userManager.php';
require 'class/userArea.php';
require 'class/projects.php';
require 'class/projectsManager.php';
require 'class/imageManager.php';


session_start();


R::setup("mysql:host=localhost;dbname=siteweb", "root", "");


\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim([
    'templates.path' => 'views'
]);

$app->add(new authMiddleware());

$app->get('/', function () use ($app) {
    indexController::index();
    indexController::derniersProjets();
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
$app->get('/deconnexion', function () use ($app) {
    connexionController::deconnexion();
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
$app->get('/lostpassword', function () use ($app) {
    connexionController::lostpassword();
});
$app->get('/friends', function () use ($app) {
    friendsController::index();
});
$app->get('/profil', function () use ($app) {
    profilController::index();
});
$app->post('/profil', function () use ($app) {
    profilController::save();
});
$app->get('/message', function () use ($app) {
    messageController::index();
});
$app->put('/message', function () use ($app) {
    messageController::readAllMessage();
});
$app->post('/message', function () use ($app) {
    messageController::sendMessage();
});
$app->post('/lostpassword', function () use ($app) {
    connexionController::golostpassword();
});
$app->get('/admin', function () use ($app) {
    adminController::index();
});
$app->post('/admin', function () use ($app) {
    adminController::addProject();
});
$app->get('/delproject/:id', function ($id) use ($app) {
    adminController::delProject($id);
});
$app->get('/modifproject/:id', function ($id) use ($app) {
    adminController::getProjectById($id);
});
$app->post('/modifproject/:id', function ($id) use ($app) {
    adminController::saveProjectModification($id);
});
$app->post('/formules', function () use ($app) {
    formulesController::createFormulaire($_POST['amount']);
});
$app->get('/addcredit', function () use ($app) {
   formulesController::addCreditToAccount();
});
$app->get('/showproject/:id', function ($id) use ($app) {
    projetsController::showInfosProjet($id);
});
$app->post('/showproject/:id', function ($id) use ($app) {
    projetsController::addCreditToProject($id);
});
$app->get('/membre', function () use ($app) {
    membreController::userArea();
});

$app->render('header.php');
$uri = $app->request()->getRootUri();
$app->render('navigation.php', array(
    "uri" => $uri
));

$app->run();

$app->render('footer.php');