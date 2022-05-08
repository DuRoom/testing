<?php

namespace DuRoom\Testing\integration\Extend;

use DuRoom\Extend\ExtenderInterface;
use DuRoom\Extension\Extension;
use DuRoom\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Container\Container;

class SetSettingsBeforeBoot implements ExtenderInterface
{
    /**
     * IDs of extensions to boot
     */
    protected $settings;

    public function __construct($settings)
    {
        $this->settings = $settings;
    }

    public function extend(Container $container, Extension $extension = null)
    {
        if (count($this->settings)) {
            $settings = $container->make(SettingsRepositoryInterface::class);
            
            foreach ($this->settings as $key => $value) {
                $settings->set($key, $value);
            }
        }
    }
}
