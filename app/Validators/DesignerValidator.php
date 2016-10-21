<?php
namespace App\Validators;

use App\Contracts\Validators\DesignerValidatorInterface;

class DesignerValidator extends AbstractValidator implements DesignerValidatorInterface
{
    protected function rules($id = null)
    {
        return [
            'create' => [
                'name' => 'required | min:3 | unique:designers,name',
            ],
            'update' => [
                'name' => 'required | min:3 | unique:designers,name,'.$id,
            ],
            'delete' => [],
        ];
    }
}
