<?php

namespace App\Jobs\Setting;

use App\Contracts\Repositories\SettingRepositoryInterface;
use Illuminate\Bus\Queueable;

class UpdateSetting
{
    use Queueable;

    public $id;
    public $attributes;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, array $attributes)
    {
        $this->id = $id;
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SettingRepositoryInterface $settings)
    {
        $settings->find($this->id)->update($this->attributes);
    }
}
