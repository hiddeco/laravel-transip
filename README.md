Laravel TransIP
===============
[![Build Status](https://scrutinizer-ci.com/g/hiddeco/laravel-transip/badges/build.png?b=master)](https://scrutinizer-ci.com/g/hiddeco/laravel-transip/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/hiddeco/laravel-transip/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/hiddeco/laravel-transip/?branch=master)
[![MIT license](http://img.shields.io/badge/license-MIT-brightgreen.svg)](http://opensource.org/licenses/MIT)
[![StyleCI](https://styleci.io/repos/41059403/shield)](https://styleci.io/repos/41059403)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/08fce49f-ae4c-4c8f-8667-bd297c7b708e/mini.png)](https://insight.sensiolabs.com/projects/08fce49f-ae4c-4c8f-8667-bd297c7b708e)

Laravel TransIP provides a bridge between the [TransIP package](https://github.com/hiddeco/transip) and Laravel 5.*.

## Installation
To use this package without running into trouble you will need PHP 5.5+ or HHVM 3.6+, and Composer.

1.	Get the latest version of Laravel TransIP, add the following line to your composer.json file
	`"hiddeco/laravel-transip": "5.3"`

2.	Run `composer update` or `composer install`

3.	Register the Laravel TransIP service provider in `config/app.php` by adding
	`'TransIP\Laravel\TransIPServiceProvider::class'` to the providers key

4.	Add the `TransIP` facade to the aliases key: `'TransIP' => TransIP\Laravel\Facades\TransIP::class`

## Configuration
To manage your TransIP connections run the `php artisan vendor:publish` command, this will create the `config/transip.php`
file where you can modify and manage your client connections.

The following configuration options are available:

**Default Connection Name**

The TransIP connection name set here (`default`) is the default connection used for all API requests. However, you may 
use as many connections as you need using the manager class. The default setting is `'main'`.

**TransIP Connections**

This is the place to configure your TransIP connections (`connections`). A default configuration with possible 
options (except your API credentials) is already present and there is no limit to the amount of connections.

Each connection has 2 required fields (`username` and `private_key`) and 2 optional fields (`mode` and `endpoint`).
It is worth mentioning the `mode` field only accepts `readonly` and `readwrite` as values.

## Usage

### TransIP Manager
The `TransIPManager` is where the magic happens. Bounded to the ioc container as `transip` and accessible by using the 
`Facade\TransIP` facade. It uses parts of the [Laravel Manager](https://github.com/GrahamCampbell/Laravel-Manager) 
package to manage the TransIP client connections. For more information about the Manager you should check out the respective 
[docs](https://github.com/GrahamCampbell/Laravel-Manager#usage). 

It is worth noting the connection returned will always be an instance of `\HiddeCo\TransIP\Client`. You 
can find more information about this instance and its methods in the [TransIP docs](https://github.com/hiddeco/transip/blob/master/doc/).

### TransIP Facade
The TransIP facade will pass static method calls to the `transip` object in the ioc container, which as stated 
before is the `TransIPManager` class.

### Examples
The usage of this package is fairly simple. Add your TransIP API credentials to the  `main` connection and the package 
will work without any further settings.

**Using the Facade**

````php
use TransIP\Laravel\Facades\TransIP;

$domainNames = TransIP::domain()->getDomainNames();
// and you're done
````

**Using the TransIP Manager**

The `TransIPManager` returns an instance of `\HiddeCo\TransIP\Client` and will behave like it. If 
you want to call a specific connection, you can use the `connection` method:

````php
use TransIP\Laravel\Facades\TransIP;

$domainNames = TransIP::connection('alternative')->domain()->getDomainNames();
````

Changing the default connection and further explanations:

````php
use TransIP\Laravel\Facades\TransIP;

TransIP::connection('main')->domain()->getDomainNames();
TransIP::domain()->getDomainNames();
TransIP::connection()->domain()->getDomainNames();
// are all the same because 

TransIP::getDefaultConnection();
// returns 'main' as set in the configuration file

TransIP::setDefaultConnection('alternative');
// the 'alternative' connection is now the default connection
````

**Dependency Injection**

Prefer the use of a dependency injection over facades? You can easily inject the manager:

````php
use TransIP\Laravel\TransIPManager;

class Foo
{
	protected $transIP;
	
	public function __construct(TransIPManager $transIP)
	{
		$this->transIP;
	}
	
	public function bar()
	{
		$this->transIP->domain()->getDomainNames();
	}
}
````

## License
Laravel TransIP is licensed under [The MIT License (MIT)](https://github.com/hiddeco/laravel-transip/blob/master/LICENSE).
