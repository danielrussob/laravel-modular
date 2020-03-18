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
    ├──────────── configs
    ├───────────────── one.php
    ├───────────────── two.php
    ├───────────────── three.php
    ├───────────────── foldername
    ├───────────────────── four.php
    ├──────────── etc
    ├───────────────── di.php
    ├───────────────── providers.php
    ├──────────── factories
    ├───────────────── One.php
    ├───────────────── Two.php
    ├───────────────── Three.php
    ├──────────── migrations
    ├───────────────── 2000_00_00_000010_create_first_table.php
    ├───────────────── 2000_00_00_000020_create_second_table.php
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

### configs folder

All files in this folder will be consider configs

You can refer to it as config('MODULENAME.FILENAME') or config('MODULENAME.FOLDER.FILENAME')

ex.: 

`config('module1.one')`

`config('module1.foldername.four')`

*Be careful*: configs are lowercase and plural


### etc folder

There's some defined configuration in this folder

#### di.php

di.php are an array of di in module

`<?php return [
    'bind' => [
        Interface1::class => Concrete1::class,
        Interface2::class => Concrete2::class,
    ],
    'singleton' => [
        Interface3::class => Concrete3::class,
        Interface4::class => Concrete4::class,
    ],
];
`

#### providers.php

providers.php are an array of all service provider in module

`<?php return [
    Provider1::class,
    Provider2::class
];
`

### factories folder

All files in this folder will be consider factory

then you could use factory(One::class) as if One.php was declared in factories folder of laravel

*Be careful*: factories are lowercase and plural


### migrations folder

All files in this folder will be consider migrations and will be executed in alphanumeric order (by all migrations in all modules)

*Be careful*: migrations are lowercase and plural


### views folder

All files in this folder will be consider views.

You can refer to it as Module1::filename

ex.: 

module1::first refer to first.blade.php

module1::first.foo refer to first/foo.blade.php

`return view('module1.first');`

*Be careful*: views are lowercase and plural


### helpers.php file

All functions in this file will be shared in all application

ex.:

`<?php function sum($a, $b) { return $a + $b; }`

Now you can use sum($a, $b) in all Class of your application

*Be careful*: helpers.php are lowercase and plural


### routes.php file

All routes in this file will be shared in all application

ex.:

`<?php Route::get('/hello-world', function (){ echo 'Hello World'; });`

Now you can access to yoursite.com/hello-world and see in page "Hello World"

*Be careful*: routes.php are lowercase and plural
