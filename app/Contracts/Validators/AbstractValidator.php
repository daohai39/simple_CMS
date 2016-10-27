<?php
namespace App\Contracts\Validators;

interface AbstractValidator
{
    public function validate($action, array $data, $id = null);
}
