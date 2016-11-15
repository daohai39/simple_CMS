<?php

namespace App\Http\ViewComposers;

use App\Contracts\Repositories\SettingRepositoryInterface;
use Illuminate\View\View;

class ProfileComposer
{

    protected $settings;


    public function __construct(SettingRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('settings', $this->settings->mapWithKeys(function ($setting) {
            return [$setting['key'] => $setting['value']];
        }));
    }
}
