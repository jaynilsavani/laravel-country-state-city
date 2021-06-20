<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Providers\DataProviders\CountryProvider;
use App\Providers\DataProviders\StateProvider;
use App\Providers\DataProviders\CityProvider;

class CountryStateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insertOrIgnore(CountryProvider::data());

        State::insertOrIgnore(StateProvider::data());

        foreach (collect(CityProvider::data())->chunk(15000) as $chunkCities) {
                City::insertOrIgnore($chunkCities->toArray());
        }
    }
}
