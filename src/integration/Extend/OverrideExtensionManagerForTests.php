<?php

namespace DuRoom\Testing\integration\Extend;

use DuRoom\Extend\ExtenderInterface;
use DuRoom\Extension\Extension;
use DuRoom\Extension\ExtensionManager;
use DuRoom\Testing\integration\Extension\ExtensionManagerIncludeCurrent;
use Illuminate\Contracts\Container\Container;

class OverrideExtensionManagerForTests implements ExtenderInterface
{
    /**
     * IDs of extensions to boot
     */
    protected $extensions;

    public function __construct($extensions)
    {
        $this->extensions = $extensions;
    }

    public function extend(Container $container, Extension $extension = null)
    {
        $container->when(ExtensionManagerIncludeCurrent::class)->needs('$enabledIds')->give($this->extensions);
        if (count($this->extensions)) {
            $container->singleton(ExtensionManager::class, ExtensionManagerIncludeCurrent::class);
            $extensionManager = $container->make(ExtensionManager::class);

            foreach ($this->extensions as $extension) {
                $extensionManager->enable($extension);
            }

            $extensionManager->booted = true;

            $extensionManager->extend($container);
        }
    }
}
