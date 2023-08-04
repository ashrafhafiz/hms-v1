<?php

namespace App\Providers;


use App\Interfaces\DoctorRepositoryInterface;
use App\Repositories\DoctorRepository;
use App\Repositories\SectionRepository;
use App\Interfaces\SectionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SectionRepositoryInterface::class,  SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
