<?php
namespace App\Validators;

use App\Contracts\Validators\TagValidatorInterface;

class TagValidator extends AbstractValidator implements TagValidatorInterface
{
    protected $rules = [
        'create' => [
            'name' => 'required | min:3'
        ],
        'update' => [],
        'delete' => [],
    ];
}
