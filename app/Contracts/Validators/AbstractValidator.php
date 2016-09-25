<?php
namespace App\Contracts\Validators;

interface AbstractValidator
{
    public function validate(String $action, array $data);
}
