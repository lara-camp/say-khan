<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\Role\RoleInterface;
use App\Repositories\RoleRepository\RoleRepository;
use App\Repositories\AdminRepository\AdminRepository;
use App\Repositories\Interfaces\Admin\AdminInterface;
use App\Repositories\ClinicRepository\ClinicRepository;
use App\Repositories\DoctorRepository\DoctorRepository;
use App\Repositories\Interfaces\Clinic\ClinicInterface;
use App\Repositories\Interfaces\Doctor\DoctorInterface;
use App\Repositories\Interfaces\Patient\PatientInterface;
use App\Repositories\PatientRepository\PatientRepository;
use App\Repositories\FeedBackRepository\FeedBackRepository;
use App\Repositories\Interfaces\Feedback\FeedBackInterface;
use App\Repositories\AssistantRepository\AssistantRepository;
use App\Repositories\Interfaces\Assistant\AssistantInterface;
use App\Repositories\Interfaces\Permission\PermissionInterface;
use App\Repositories\PermissionRepository\PermissionRepository;
use App\Repositories\ClinicDoctorRepository\ClinicDoctorRepository;
use App\Repositories\DoctorReportRepository\DoctorReportRepository;
use App\Repositories\Interfaces\ClinicDoctor\ClinicDoctorInterface;
use App\Repositories\Interfaces\DoctorReport\DoctorReportInterface;
use App\Repositories\Interfaces\Subscription\SubscriptionInterface;
use App\Repositories\SubscriptionRepository\SubscriptionRepository;
use App\Repositories\Interfaces\PatientDetail\PatientDetailInterface;
use App\Repositories\Interfaces\PatientRecord\PatientRecordInterface;
use App\Repositories\PatientDetailRepository\PatientDetailRepository;
use App\Repositories\PatientRecordRepository\PatientRecordRepository;
use App\Repositories\Interfaces\RolePermission\RolePermissionInterface;
use App\Repositories\RolePermissionRepository\RolePermissionRepository;
use App\Repositories\ClinicSubscriptionRepository\ClinicSubscriptionRepository;
use App\Repositories\Interfaces\ClinicSubscription\ClinicSubscriptionInterface;

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
        $this->app->bind(PatientInterface::class, PatientRepository::class);
        $this->app->bind(PatientDetailInterface::class, PatientDetailRepository::class);
        $this->app->bind(SubscriptionInterface::class, SubscriptionRepository::class);
        $this->app->bind(PermissionInterface::class, PermissionRepository::class);
        $this->app->bind(RolePermissionInterface::class, RolePermissionRepository::class);
        $this->app->bind(ClinicDoctorInterface::class, ClinicDoctorRepository::class);
        $this->app->bind(FeedBackInterface::class, FeedBackRepository::class);
        $this->app->bind(ClinicSubscriptionInterface::class, ClinicSubscriptionRepository::class);
        $this->app->bind(PatientRecordInterface::class, PatientRecordRepository::class);
        $this->app->bind(AdminInterface::class, AdminRepository::class);
        $this->app->bind(DoctorReportInterface::class, DoctorReportRepository::class);
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
