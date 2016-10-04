<?php
namespace App\Validators;

use App\Contracts\Validators\SettingValidatorInterface;

class SettingValidator extends AbstractValidator implements SettingValidatorInterface
{
    protected function rules($id = null)
    {
        return [
            'update' => [
            ],
        ];
    }
}
