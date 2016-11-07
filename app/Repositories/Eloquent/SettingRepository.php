<?php
namespace App\Repositories\Eloquent;

use App\Setting;
use App\Contracts\Repositories\SettingRepositoryInterface;

class SettingRepository extends AbstractRepository implements SettingRepositoryInterface
{
	public function __construct(Setting $setting)
	{
		parent::__construct($setting);
	}
}
