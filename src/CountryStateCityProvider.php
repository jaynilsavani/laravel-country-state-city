<?php

namespace JaynilSavani\CountryStateCity;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use JaynilSavani\CountryStateCity\Console\CountryStateCityCommand;

/**
 * Class CountryStateCityProvider
 *
 * @package JaynilSavani\CountryStateCity
 */
class CountryStateCityProvider extends ServiceProvider
{
    /** @var Command */
    protected $command;

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            tap(new Filesystem(), function ($filesystem) {

                foreach (['Country', 'State', 'City'] as $modelName) {
                    $filesystem->copy(__DIR__ .'/../stubs/Models/' . $modelName . '.stub', app_path('Models/' . $modelName . '.php'));
                }

                $filesystem->copy(__DIR__ .'/../stubs/seeders/CountryStateCitySeeder.stub', database_path('seeders/CountryStateCitySeeder.php'));

                $filesystem->copy(__DIR__ .'/../stubs/migrations/2021_06_19_000000_create_country_state_city_table.stub', database_path('migrations/2021_06_19_000000_create_country_state_city_table.php'));

                File::isDirectory(app_path('Providers/DataProviders')) or File::makeDirectory(app_path('Providers/DataProviders'), 0777, true, true);

                $filesystem->copy(__DIR__ .'/../stubs/DataProviders/CityProvider.stub', app_path('Providers/DataProviders/CityProvider.php'));
                $filesystem->copy(__DIR__ .'/../stubs/DataProviders/CountryProvider.stub', app_path('Providers/DataProviders/CountryProvider.php'));
                $filesystem->copy(__DIR__ .'/../stubs/DataProviders/StateProvider.stub', app_path('Providers/DataProviders/StateProvider.php'));
            });

            $this->commands([
                CountryStateCityCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
