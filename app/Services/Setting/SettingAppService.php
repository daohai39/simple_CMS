<?php
namespace App\Services\Setting;

use App\Setting;
use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Contracts\Services\SettingAppServiceInterface;
use App\Contracts\Validators\SettingValidatorInterface;

class SettingAppService implements SettingAppServiceInterface
{
    private $services;
    private $validator;

    public function __construct(SettingRepositoryInterface $services, SettingValidatorInterface $validator)
    {
        $this->services = $services;
        $this->validator = $validator;
    }

    public function update($id, array $attributes)
    {
        $setting = $this->services->find($id);
        $this->validator->validate('update', $attributes, $id);
        $setting->update($attributes);
        return $setting;
    }
}
