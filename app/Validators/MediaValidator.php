<?php
namespace App\Validators;

use App\Contracts\Validators\MediaValidatorInterface;

class MediaValidator extends AbstractValidator implements MediaValidatorInterface
{
    protected function rules($id = null)
    {
      	return [
            'image' => [
            	'image' => 'image'
            ],
        ];
    }
}
