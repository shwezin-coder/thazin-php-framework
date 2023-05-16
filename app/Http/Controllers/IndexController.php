<?php 
namespace Thazin\App\Http\controllers;

use Thazin\App\Models\User;
use Thazin\Core\Controller;
use Thazin\Core\Request;
use Thazin\Core\Response;
use Thazin\Core\Router;

class IndexController extends Controller{
    public function index()
    {
        $name = 'Daniel Hardin';
        return view('index',compact('name'));
    }
    public function register(Request $request,Response $response)
    {
        $User = new User();
        if($request->isPost())
        {
            $User->loadData($request->getBody());
            if($User->validate() && $User->save())
            {
                // Application::$app->session->setFlash('success','Thanks for registering');
                Router::$router->response->redirect('/');
            }
            return view('register',[
                'table' => $User
            ]);
        }
        return view('register',[
            'table' => $User
        ]);
    }
}