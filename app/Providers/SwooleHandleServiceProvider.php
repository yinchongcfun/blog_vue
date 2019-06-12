<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/6/12
 * Time: 2:45 PM
 */

namespace App\Providers;


use App\Handle\SwooleHandle;
use Illuminate\Support\ServiceProvider;

class SwooleHandleServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    public function register()
    {
        $this->app->singleton('swoole',function(){
            return new SwooleHandle();
        });
    }
}