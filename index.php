<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
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
	//chama o construct
	$page = new PageAdmin();

	//chama o arquivo h1
	$page->setTpl("index");
});

// 
$app->run();

 ?>