<?php
namespace App\Validators;

use App\Contracts\Validators\ProductValidatorInterface;

class ProductValidator extends AbstractValidator implements ProductValidatorInterface
{
    protected function rules($id = null)
    {
        return [
            'create' => [
                'name' => 'required | min:3 | unique:products,name',
                'code' => 'required | min:1 | unique:products,code',
                'author' => 'required | min:3',
                'category_id' => 'required | exists:categories,id'
            ],
            'update' => [
                'name' => 'required | min:3 | unique:products,name,'.$id,
                'code' => 'required | min:1 | unique:products,code,'.$id,
                'author' => 'required | min:3',
                'category_id' => 'required | exists:categories,id'
            ],
            'delete' => [],
        ];
    }
}
