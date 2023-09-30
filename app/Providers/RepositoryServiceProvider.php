<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Repositories\ClinicRepository\ClinicRepository;
use App\Repositories\Interfaces\Clinic\ClinicInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClinicInterface::class, ClinicRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}