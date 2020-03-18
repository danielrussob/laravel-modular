<?php

namespace DNAFactory\Core\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class ModuleFinderServiceProvider extends ModuleDiscoverServiceProvider
{
    public function getBasePath()
    {
        $modulePath = app_path() . DIRECTORY_SEPARATOR . 'Modules';
        return $modulePath;
    }

    public function getModuleName()
    {
        return 'NotUsedHere';
    }

    public function boot()
    {
        $basePath = $this->getBasePath();
        if (!file_exists($basePath)) {
            return;
        }

        $directories = new \DirectoryIterator($basePath);
        foreach ($directories as $fileinfo) {
            if (!$fileinfo->isDir()) {
                continue;
            }

            if ($fileinfo->isDot()) {
                continue;
            }

            $moduleName = $fileinfo->getFilename();
            $modulePath = $basePath . DIRECTORY_SEPARATOR . $moduleName;

            $this->loadModule($modulePath, $moduleName);
        }
    }
}
