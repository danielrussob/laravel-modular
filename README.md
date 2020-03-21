# Transform laravel in a modular system

## Usage

Install

`composer require dnafactory/laravel-modular`

Create a folder Modules under app

-----> app/Modules


That's it!

## Create a Module

Create a folder under Modules

ex.: app/Modules/Module1

that's it!

## Module structure

    app
    ├── Modules
    ├────── Module1
    ├──────────── Api
    ├───────────────── Data
    ├───────────────────── OneInterface.php
    ├───────────────────── TwoInterface.php
    ├───────────────── OneRepositoryInterface.php
    ├───────────────── TwoManagementInterface.php
    ├──────────── Command
    ├───────────────── OneCommand.php
    ├───────────────── TwoCommand.php
    ├──────────── configs
    ├───────────────── one.php
    ├───────────────── two.php
    ├───────────────── three.php
    ├───────────────── foldername
    ├───────────────────── four.php
    ├──────────── Controller
    ├───────────────── OneController.php
    ├───────────────── TwoController.php
    ├──────────── Management
    ├───────────────── OneManagement.php
    ├───────────────── TwoManagement.php
    ├──────────── etc
    ├───────────────── commands.php
    ├───────────────── di.php
    ├───────────────── providers.php
    ├──────────── factories
    ├───────────────── One.php
    ├───────────────── Two.php
    ├───────────────── Three.php
    ├──────────── Factory
    ├───────────────── OneFactory.php
    ├───────────────── TwoFactory.php
    ├───────────────── ThreeFactory.php
    ├──────────── Management
    ├───────────────── OneManagement.php
    ├───────────────── TwoManagement.php
    ├───────────────── ThreeManagement.php
    ├──────────── Middleware
    ├───────────────── OneMiddleware.php
    ├───────────────── TwoMiddleware.php
    ├───────────────── ThreeMiddleware.php
    ├──────────── migrations
    ├───────────────── 2000_00_00_000010_create_first_table.php
    ├───────────────── 2000_00_00_000020_create_second_table.php
    ├──────────── Model
    ├───────────────── One.php
    ├───────────────── Two.php
    ├───────────────── Three.php
    ├──────────── Provider
    ├───────────────── OneServiceProvider.php
    ├───────────────── TwoServiceProvider.php
    ├───────────────── ThreeServiceProvider.php
    ├──────────── Queue
    ├───────────────── OnePublisher.php
    ├───────────────── OneConsumer.php
    ├──────────── Repository
    ├───────────────── OneRepository.php
    ├───────────────── TwoRepository.php
    ├──────────── Seed
    ├───────────────── OneSeeder.php
    ├───────────────── TwoSeeder.php
    ├──────────── views
    ├───────────────── first.blade.php
    ├───────────────── second.blade.php
    ├──────────── helpers.php
    ├──────────── routes.php
    ├────── Module2
    ├──────────── ...
    ├──────────── ...
    ├────── Module3
    ├──────────── ...
    ├──────────── ...

### Api folder

All files in this folder are Service Contract's file of: Facade, Proxy, Mediator, Strategy or generic Service

All files are interface

Don't forget to register this class in etc/di.php

*Be careful*: Api has first letter in uppercase and singular


### Api/Data folder

All files in this folder are Service Contract's file of: Model or generic Data Class

All files are interface

Don't forget to register this class in etc/di.php

*Be careful*: Data has first letter in uppercase and singular


### Command folder

All files in this folder are Console Command

*Be careful*: Command has first letter in uppercase and singular

### configs folder

All files in this folder will be consider configs

You can refer to it as config('MODULENAME.FILENAME') or config('MODULENAME.FOLDER.FILENAME')

ex.: 

```php
config('module1.one');
```

```php
config('module1.foldername.four');
```

*Be careful*: configs are lowercase and plural


### Controller folder

All files in this folder are Controller

All files must terminate with Controller word

*Be careful*: Controller has first letter in uppercase and singular

### etc folder

There's some defined configuration in this folder

#### di.php

di.php are an array of di in module

```php
<?php return [
    'bind' => [
        Interface1::class => Concrete1::class,
        Interface2::class => Concrete2::class,
    ],
    'singleton' => [
        Interface3::class => Concrete3::class,
        Interface4::class => Concrete4::class,
    ],
];
```

#### providers.php

providers.php are an array of all service provider in module

```php
<?php return [
    Provider1::class,
    Provider2::class
];
```

#### commands.php

commands.php are an array of all commands in module

```php
<?php return [
    Command1::class,
    Command2::class
];
```


### factories folder

All files in this folder will be consider laravel's factory

then you could use factory(One::class) as if One.php was declared in factories folder of laravel

*Be careful*: factories are lowercase and plural


### Factory folder

All files in this folder are custom Factory

All files must terminate with Factory word

*Be careful*: Factory has first letter in uppercase and singular

See Factory Pattern in https://refactoring.guru/design-patterns/factory-method

### Management folder

All files in this folder are Management

Place here all: Facade, Proxy, Mediator, Strategy or generic Service

All files must terminate with Management word. 
You must not specify pattern in filename.

*Be careful*: Management has first letter in uppercase and singular

See Facade pattern: https://refactoring.guru/design-patterns/facade
See Proxy pattern: https://refactoring.guru/design-patterns/proxy
See Mediator pattern: https://refactoring.guru/design-patterns/mediator
See Strategy pattern: https://refactoring.guru/design-patterns/strategy

### Middleware folder

All files in this folder are Middleware file

*Be careful*: Middleware has first letter in uppercase and singular

### migrations folder

All files in this folder will be consider migrations and will be executed in alphanumeric order (by all migrations in all modules)

*Be careful*: migrations are lowercase and plural

### Model folder

All files in this folder are Model

*Be careful*: Model has first letter in uppercase and singular

### Provider folder

All files in this folder are custom Provider

Don't forget to register all providers in etc/providers.php

All files must terminate with ServiceProvider word

*Be careful*: Provider has first letter in uppercase and singular


### Queue folder

All files in this folder are publisher / consumer queue

All files must terminate with Publisher or Consumer word

*Be careful*: Queue has first letter in uppercase and singular

### Repository folder

All files in this folder are Repository

All files must terminate with Repository word

*Be careful*: Repository has first letter in uppercase and singular

### Seed folder

All files in this folder are Seeder

All files must terminate with Seed word

Remember to extend \Illuminate\Database\Seeder

*Be careful*: Seeder has first letter in uppercase and singular

### views folder

All files in this folder will be consider views.

You can refer to it as Module1::filename

ex.: 

module1::first refer to first.blade.php

module1::first.foo refer to first/foo.blade.php

```php
return view('module1.first');
```

*Be careful*: views are lowercase and plural


### helpers.php file

All functions in this file will be shared in all application

ex.:

```php
<?php function sum($a, $b) { return $a + $b; }
```

Now you can use sum($a, $b) in all Class of your application

*Be careful*: helpers.php are lowercase and plural


### routes.php file

All routes in this file will be shared in all application

ex.:

```php
<?php Route::get('/hello-world', function (){ echo 'Hello World'; });
```

Now you can access to yoursite.com/hello-world and see in page "Hello World"

*Be careful*: routes.php are lowercase and plural

## How to register a Cron

Create a file in Provider folder called RegisterCronServiceProvider that extends \DNAFactory\Core\Provider\RegisterCronServiceProvider

Implement protected method registerCron(Schedule $schedule) like this

```php
protected function registerCron(Schedule $schedule) {
    $schedule->command('command:name')->everyMinute();
}
```

Now register this ServiceProvider in etc/providers.php

## How to create a modular packages

In composer.json specify dependency for dnafactory/laravel-modular

Create a ServiceProvider that extends \DNAFactory\Core\Provider\ModuleRegisterServiceProvider

Implements getModuleName, specifing a Module name

```php
public function getModuleName() { return 'ModuleName'; } 
```

Implements getBasePath, specifing a root path of module

If files are stored in root:

```php
public function getBasePath(){ return __DIR__ . DIRECTORY_SEPARATOR . '..'; }
```

If files are stored in src:

```php 
public function getBasePath(){ 
    return __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src'; 
} 
```

Add This service provider in AutoDiscover

```json
"extra": {
         "laravel": {
             "providers": [
                 "VendorName\\ModuleName\\Provider\\NameOfServiceProvider"
             ]
         }
     },
```

You can see an example in \DNAFactory\Core\Provider\ExampleModuleRegisterServiceProvider of this module
