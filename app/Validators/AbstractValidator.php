<?php
namespace App\Validators;

use Illuminate\Validation\Factory as ValidatorFactory;

abstract class AbstractValidator
{
    protected $validator;

    public function __construct(ValidatorFactory $validator)
    {
        $this->validator = $validator;
    }


    public function validate($action, array $data, $id = null)
    {
        $validation = $this->validator->make($data, $this->getRules($action, $id))->validate();
    }

    private function getRules($action, $id = null)
    {
        $id = ($id == null) ? '' : $id;
        if( !array_key_exists($action, $this->rules($id)) ) {
            throw new \InvalidArgumentException("Action: {$action} not exist in rules");
        }

        return $this->rules($id)[$action];
    }

    abstract protected function rules($id = null);
}
