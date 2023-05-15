<?php 
namespace Thazin\Core;

class Controller{
    protected array $middlewares = [];
    public string $layout = 'main';
    public string $action = '';
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
   
}