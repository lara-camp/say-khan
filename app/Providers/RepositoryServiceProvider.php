<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

use App\Repositories\ClinicRepository\ClinicRepository;
use App\Repositories\DoctorRepository\DoctorRepository;
use App\Repositories\AssistantRepository\AssistantRepository;
use App\Repositories\Interfaces\Clinic\ClinicInterface;
use App\Repositories\Interfaces\Doctor\DoctorInterface;
use App\Repositories\Interfaces\Assistant\AssistantInterface;
use App\Repositories\Interfaces\Role\RoleInterface;
use App\Repositories\RoleRepository\RoleRepository;

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
        $this->app->bind(DoctorInterface::class, DoctorRepository::class);
        $this->app->bind(AssistantInterface::class, AssistantRepository::class);
        $this->app->bind(RoleInterface::class, RoleRepository::class);
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
