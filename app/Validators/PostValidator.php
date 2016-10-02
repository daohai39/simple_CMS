<?php
namespace App\Validators;

use App\Contracts\Validators\PostValidatorInterface;

class PostValidator extends AbstractValidator implements PostValidatorInterface
{
    protected function rules($id = null)
    {
        return [
            'create' => [
                'title' => 'required | min:3 | unique:posts,title',
            ],
            'update' => [
                'title' => 'required | min:3 | unique:posts,title,'.$id,
            ],
            'delete' => [],
        ];
    }
}
