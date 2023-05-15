<?php

use Thazin\Core\Router;

function view($view, $params = [])
{
    return Router::$router->view->renderView($view,$params);
}
