<?php 
namespace Thazin\Core\Form;
use Thazin\Core\Validation;
use Thazin\Core\Form\InputField;
class Form{
    public static function begin($action,$method)
    {
        echo sprintf('<form action="%s" method="%s">',$action,$method);
         return new Form();
    }
    public static function end()
    {
        echo '</form>';
    }
    public function field(Validation $validation,$attribute)
    {
        return new InputField($validation,$attribute);
    }
}