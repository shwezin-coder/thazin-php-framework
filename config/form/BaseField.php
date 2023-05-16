<?php 
namespace Thazin\Core\Form;
use Thazin\Core\Validation;
abstract class BaseField{
    public Validation $validation;
    public string $attribute;
    abstract public function renderInput() : string;

    public function __construct(Validation $validation,string $attribute)
    {
        $this->validation = $validation;
        $this->attribute = $attribute;
    }
    public function __toString()
    {
        return sprintf('
            <div class="form-group">
                <label for="first_name">%s</label>
                    %s
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        ',$this->validation->getLabel($this->attribute), 
         $this->renderInput(),
         $this->validation->getFirstError($this->attribute)
    );
    }
}