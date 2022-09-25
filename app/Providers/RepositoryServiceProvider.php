<?php

namespace App\Providers;

use App\Interfaces\FaqRepositoryInterface;
use App\Interfaces\MessageRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\SettingRepositoryInterface;
use App\Interfaces\TestimonialsRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\FaqRepository;
use App\Repositories\MessageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SettingRepository;
use App\Repositories\TestimonialsRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        FaqRepositoryInterface::class => FaqRepository::class,
        TestimonialsRepositoryInterface::class => TestimonialsRepository::class,
        ProductRepositoryInterface::class => ProductRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        MessageRepositoryInterface::class => MessageRepository::class,
        SettingRepositoryInterface::class => SettingRepository::class,
    ];
    
    // public $singletons = [
    //     FaqRepositoryInterface::class => FaqRepository::class,
    // ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
