<?php 
namespace Thazin\App\Http\controllers;

use Thazin\Core\Controller;
use Thazin\Core\Request;
use Thazin\Core\Response;

class IndexController extends Controller{
    public function index()
    {
        $name = 'Daniel Hardin';
        return view('index',compact('name'));
    }
    public function contact(Request $request,Response $response)
    {
        if($request->isPost())
        {
            var_dump($request->getBody());
        }
        return view('contact');
    }
}