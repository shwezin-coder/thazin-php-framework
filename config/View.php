<?php 
namespace Thazin\Core;

use Thazin\Core\Router;

class View{
    public string $title = '';
    public function renderView($view, $params = [])
    {
      $viewContent = $this->renderOnlyView($view, $params);
      $layoutContent = $this->layoutContent();
      echo str_replace('{{content}}',$viewContent,$layoutContent);
    }

    public function renderContent($viewContent)
    {
      $layoutContent = $this->layoutContent();
      echo str_replace('{{content}}',$viewContent,$layoutContent,);
    }

    protected function layoutContent()
    {
      $layout = Router::$router->layout;
      if(Router::$router->controller)
      {
        $layout = Router::$router->controller->layout;
      }
      ob_start();
      include_once Router::$ROOT_DIR."/views/layouts/$layout.php";
      return ob_get_clean();
    }
    protected function renderOnlyView($view, $params)
    {
      foreach($params as $key => $value)
      {
        $$key = $value;
      }
      ob_start();
      include_once Router::$ROOT_DIR."/views/$view.php";
      return ob_get_clean();
    }
}