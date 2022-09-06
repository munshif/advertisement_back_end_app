<?php

namespace App\Providers;

use App\Interfaces\AdvertisementInterface;
use App\Interfaces\UserInterface;
use App\Repositories\AdvertisementRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * @return void
     * @author mohamedmunshif
     * @description Register providers
     */
    public function register()
    {
        // Register User Interface and User Repository in here
        $this->app->bind(
            UserInterface::class,
            UserRepository::class
        );

        // Register Advertisement Interface and Advertisement Repository in here
        $this->app->bind(
            AdvertisementInterface::class,
            AdvertisementRepository::class
        );
    }
}
