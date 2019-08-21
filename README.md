Ray.FirebaseModule
================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/piotzkhider/Ray.FirebaseModule/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/piotzkhider/Ray.FirebaseModule/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/piotzkhider/Ray.FirebaseModule/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/piotzkhider/Ray.FirebaseModule/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/piotzkhider/Ray.FirebaseModule/badges/build.png?b=master)](https://scrutinizer-ci.com/g/piotzkhider/Ray.FirebaseModule/build-status/master)
[![Build Status](https://travis-ci.org/piotzkhider/Ray.FirebaseModule.svg?branch=master)](https://travis-ci.org/piotzkhider/Ray.FirebaseModule)

[Firebase](https://github.com/kreait/firebase-php) Module for [Ray.Di](https://github.com/ray-di/Ray.Di)

## Installation

### Composer install

```bash
$ composer require piotzkhider/ray.firebase-module
```
 
### Module install

```php
use Piotzkhider\FirebaseModule\FirebaseModule;
use Ray\Di\AbstractModule;

class AppModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new FirebaseModule($_ENV['GOOGLE_APPLICATION_CREDENTIALS']));
    }
}
```

### DI trait

 * [FirebaseInject](https://github.com/piotzkhider/Ray.FirebaseModule/blob/master/src/FirebaseInject.php) for `Firebase`
