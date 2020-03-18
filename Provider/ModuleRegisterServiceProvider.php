<?php

namespace DNAFactory\Core\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

abstract class ModuleRegisterServiceProvider extends ModuleDiscoverServiceProvider
{
    abstract public function getBasePath();

    abstract public function getModuleName();

    public function boot()
    {
        $basePath = $this->getBasePath();
        if (!file_exists($basePath)) {
            return;
        }

        $moduleName = $this->getModuleName();
        $this->loadModule($basePath, $moduleName);
    }
}
