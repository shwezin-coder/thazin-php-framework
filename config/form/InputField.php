<?php 
namespace Thazin\Core\Form;
use Thazin\Core\Validation;
use Thazin\Core\Form\BaseField;
class InputField extends BaseField{
    public string $type;
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public function __construct(Validation $validation,string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($validation,$attribute);
    }
    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
    public function renderInput() : string{
        return sprintf('
                <input type="%s" name="%s" value="%s" class="form-control %s">
        ',
         $this->type,
         $this->attribute,
         $this->validation->{$this->attribute},
         $this->validation->hasError($this->attribute) ? 'is-invalid' : ''
    );
    }
}