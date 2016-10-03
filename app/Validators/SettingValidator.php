<?php
namespace App\Validators;

use App\Contracts\Validators\SettingValidatorInterface;

class SettingValidator extends AbstractValidator implements SettingValidatorInterface
{
    protected function rules($id = null)
    {
        return [
            'update' => [
                'name' => 'required | min:3 | unique:settings,name,'.$id,
                'value' => 'required| min:5,'.$id,
            ],
        ];
    }
}
