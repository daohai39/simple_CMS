<?php
namespace App\Validators;

use App\Contracts\Validators\CategoryValidatorInterface;

class CategoryValidator extends AbstractValidator implements CategoryValidatorInterface
{
    protected $rules = [
        'create' => [
            'name' => 'required | min:3'
        ],
        'update' => [],
        'delete' => [],
    ];
}
