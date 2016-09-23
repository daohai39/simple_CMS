<?php
namespace App\Validators;

use App\Contracts\Validators\ProductValidatorInterface;

class ProductValidator extends AbstractValidator implements ProductValidatorInterface
{
    protected $rules = [
        'create' => [
            'name' => 'required | min:3'
        ],
        'update' => [],
        'delete' => [],
    ];
}
