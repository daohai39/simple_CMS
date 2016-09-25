<?php
namespace App\Validators;

use Illuminate\Validation\Factory as ValidatorFactory;

abstract class AbstractValidator
{
    protected $validation;
    protected $validator;
    protected $rules = array();

    public function __construct(ValidatorFactory $validator)
    {
        $this->validator = $validator;
    }


    public function validate(String $action, array $data)
    {
        $this->validation = $this->validator->make($data, $this->getRules($action));

        if ( $this->validation->fails() ) {
            throw new ValidationException( $this->validation->errors() );
        }
    }

    private function getRules(String $action)
    {
        if(! array_key_exists($action, $this->rules)) {
            throw new \InvalidArgumentException("Action: {$action} not exist in rules");
        }

        return $this->rules[$action];
    }
}
