<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\EloquentUserRepository;

class UserRepositoryServiceProvider extends ServiceProvider{
    public function register(){
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }
    public function boot(){
        //
    }
}