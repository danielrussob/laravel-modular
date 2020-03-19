<?php

namespace DNAFactory\Core\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

abstract class ModuleRegisterServiceProvider extends ModuleDiscoverServiceProvider
{
    public function register()
    {
        $module = $this->getCurrentModule();
        $this->bootModule($module['path'], $module['name']);
    }

    public function boot()
    {
        $module = $this->getCurrentModule();
        $this->bootModule($module['path'], $module['name']);
    }

    protected function getCurrentModule()
    {
        $basePath = $this->getBasePath();
        if (!file_exists($basePath)) {
            return [];
        }

        $moduleName = $this->getModuleName();
        return ['name' => $moduleName, 'path' => $basePath];
    }
}
