<?php
namespace App\Validators;

use App\Contracts\Validators\CategoryValidatorInterface;

class CategoryValidator extends AbstractValidator implements CategoryValidatorInterface
{
    protected function rules($id = null)
    {
        return [
            'create' => [
                'name' => 'required | min:3 | unique:categories,name',
                'parent_id' => 'exists:categories,id'
            ],
            'update' => [
                'name' => 'required | min:3 | unique:categories,name,'.$id,
                'parent_id' => 'exists:categories,id'
            ],
            'delete' => [],
        ];
    }
}
