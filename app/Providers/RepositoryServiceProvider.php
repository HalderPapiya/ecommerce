<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Interfaces\LeveltwocategoryRepositoryInterface;
use App\Repositories\LeveltwocategoryRepository;
use App\Interfaces\LevelthreecategoryRepositoryInterface;
use App\Repositories\LevelthreecategoryRepository;
use App\Interfaces\LevelfourcategoryRepositoryInterface;
use App\Repositories\LevelfourcategoryRepository;
use App\Interfaces\LevelfivecategoryRepositoryInterface;
use App\Repositories\LevelfivecategoryRepository;
use App\Interfaces\SettingRepositoryInterface;
use App\Repositories\SettingRepository;
use App\Interfaces\BannerRepositoryInterface;
use App\Repositories\BannerRepository;
use App\Interfaces\BlogRepositoryInterface;
use App\Repositories\BlogRepository;
use App\Interfaces\CustomerRepositoryInterface;
use App\Repositories\CustomerRepository;
use App\Interfaces\CouponRepositoryInterface;
use App\Repositories\CouponRepository;
use App\Interfaces\BrandRepositoryInterface;
use App\Repositories\BrandRepository;
use App\Interfaces\sellerRepositoryInterface;
use App\Repositories\sellerRepository;
use App\Interfaces\AddressRepositoryInterface;
use App\Repositories\AddressRepository;
use App\Interfaces\BankRepositoryInterface;
use App\Repositories\BankRepository;
use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() 
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(LeveltwocategoryRepositoryInterface::class, LeveltwocategoryRepository::class);
        $this->app->bind(LevelthreecategoryRepositoryInterface::class, LevelthreecategoryRepository::class);
        $this->app->bind(LevelfourcategoryRepositoryInterface::class, LevelfourcategoryRepository::class);
        $this->app->bind(LevelfivecategoryRepositoryInterface::class, LevelfivecategoryRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CouponRepositoryInterface::class, CouponRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(sellerRepositoryInterface::class, sellerRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(BankRepositoryInterface::class, BankRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
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