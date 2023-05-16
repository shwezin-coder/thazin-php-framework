<?php 

use Thazin\App\Http\Controllers\IndexController;
$app->get('/',[IndexController::class,'index']);
$app->get('/register',[IndexController::class,'register']);
$app->post('/register',[IndexController::class,'register']);
$app->run();