<?php 
namespace Thazin\App\Exceptions;
class NotFoundException extends \Exception{
    protected $code = 404;
    protected $message = 'Not Found';
}