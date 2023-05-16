<?php 
namespace Thazin\Core\Form;
use Thazin\Core\Form\BaseField;
class TextareaField extends BaseField{
    public function renderInput() : string
    {
        return sprintf('<textarea name="%s" class="form-control%s">%s</textarea>',
            $this->attribute,
            $this->validation->hasError($this->attribute) ? 'is-invalid' : '',
            $this->validation->{$this->attribute}
        );
    }
}