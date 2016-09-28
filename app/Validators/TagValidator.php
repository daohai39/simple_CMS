<?php
namespace App\Validators;

use App\Contracts\Validators\TagValidatorInterface;

class TagValidator extends AbstractValidator implements TagValidatorInterface
{
    protected function rules($id = null)
    {
        return [
            'create' => [
                'name' => 'required | min:3 | unique:tags,name',
            ],
            'update' => [
                'name' => 'required | min:3 | unique:tags,name,'.$id,
            ],
            'delete' => [],
        ];
    }
}
