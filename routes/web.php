<?php 

use Thazin\App\Http\Controllers\IndexController;

$app->get('/',[IndexController::class,'index']);
$app->get('/contact',[IndexController::class,'contact']);
$app->post('/contact',[IndexController::class,'contact']);
$app->run();