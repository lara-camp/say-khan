<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

use App\Repositories\ClinicRepository\ClinicRepository;
use App\Repositories\DoctorRepository\DoctorRepository;
use App\Repositories\AssistantRepository\AssistantRepository;
use App\Repositories\Interfaces\Clinic\ClinicInterface;
use App\Repositories\Interfaces\Doctor\DoctorInterface;
use App\Repositories\Interfaces\Assistant\AssistantInterface;
use App\Repositories\Interfaces\Patient\PatientDetailInterface;
use App\Repositories\Interfaces\Patient\PatientInterface;
use App\Repositories\Patient\PatientDetailRepository;
use App\Repositories\Patient\PatientRepository;

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
        $this->app->bind(PatientInterface::class, PatientRepository::class);
        $this->app->bind(PatientDetailInterface::class, PatientDetailRepository::class);
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