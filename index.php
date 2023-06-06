<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;
  
$app = new Slim();

$app->config('debug', true);
//rota que chamamos
$app->get('/', function() {
	//chama o construct
	$page = new Page();

	//chama o arquivo h1
	$page->setTpl("index");
});

$app->get('/admin', function() {

	User::verifyLogin();

	//chama o construct
	$page = new PageAdmin();

	//chama o arquivo h1
	$page->setTpl("index");
});

$app->get('/admin/login', function() {
	//chama o construct
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	//chama o arquivo h1
	$page->setTpl("login");
});

$app->post('/admin/login', function() {
	//chama o construct
	User::login($_POST["login"], $_POST["password"]);

	//chama o arquivo h1
	header("Location: /admin");
	exit;
});

$app->get('/admin/logout', function() {
	//chama o construct
	User::logout();

	header("Location: /admin/login");
	exit;
});
// 
$app->run();

 ?>