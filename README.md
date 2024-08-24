Laravel Country, State and City
======
[![Total Downloads](https://poser.pugx.org/jaynilsavani/laravel-country-state-city/downloads.svg)](https://packagist.org/packages/jaynilsavani/laravel-country-state-city) [![License](https://poser.pugx.org/jaynilsavani/laravel-country-state-city/license.svg)](https://poser.pugx.org/jaynilsavani/laravel-country-state-city/license.svg)


World's Country, State and City Provider for Laravel.


Installation
-----

Run a command for Laravel 8,

```
composer require jaynilsavani/laravel-country-state-city:1.0.0
```

Run a command for Laravel 7,

```
composer require jaynilsavani/laravel-country-state-city:1.1.0
```

To publish configurations,

```
php artisan world:publish
```


Usage
-----
To get all the data from Country:

```php
use App\Models\Country;

// To get all the countries
$countries = Country::all();


// To get all the states from country
$states = Country::where('name','india')->first()->states; 
$stateNames = Country::where('name','india')->first()->states->pluck('name');


// To get all the cities from country
$cities = Country::where('name','india')->first()->cities; 
$cityNames = Country::where('name','india')->first()->cities->pluck('name');
```

To get all the data from State:

```php
use App\Models\State;

// Retrieve all the states
$states = State::all();


// Retrieve country of any state
$country = State::where('name','quebec')->first()->country; 


// Retrieve all the cities of any state
$cities = State::where('name','quebec')->first()->cities; 
```

To get all the data from City:

```php
use App\Models\City;

// Retrieve all the cities
$cities = City::all();


// Retrieve state of any city
$state = City::where('name','montreal')->first()->state; 


// Retrieve country of any city
$country = City::where('name','montreal')->first()->state->country; 
```

License
-----
This package is licensed under the `MIT` License. Please see the [License File](https://github.com/jaynilsavani/laravel-country-state-city/blob/master/LICENSE) for more details.

Contributing
-----
Please see [CONTRIBUTING](https://github.com/jaynilsavani/laravel-country-state-city/blob/master/CODE_OF_CONDUCT.md) for details.
