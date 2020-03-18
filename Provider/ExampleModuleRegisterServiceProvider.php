<?php

namespace DNAFactory\Core\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class ExampleModuleRegisterServiceProvider extends \DNAFactory\Core\Provider\ModuleRegisterServiceProvider
{
    public function getBasePath()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..';
    }

    public function getModuleName()
    {
        return 'Example';
    }
}
