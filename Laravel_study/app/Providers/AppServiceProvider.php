<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //옵저버를 등록하기 위해서는, 관찰할 모델에 대해 observe 메소드를 사용하면 됩니다.
        // 서비스 프로바이더의 boot 메소드안에서 옵저버를 등록할 수 있습니
        User::observe(UserObserver::class);
    }
}
