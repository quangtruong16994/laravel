<?php

namespace App\Providers;
use MyHelper;
use App\Extensions\SMemcacheStore;
use App\Extensions\SSessionMemcacheDriver;
use Illuminate\Support\ServiceProvider;
use Cache,Session,Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Add new type cache for SCMS
        Cache::extend('memcache', function($app){
            $servers = $this->app['config']['cache.stores.memcache.servers'];
            $prefix = $this->app['config']['cache.prefix'];
            $memcache = MyHelper::MemcacheConnect($servers);
            return Cache::repository(new SMemcacheStore($memcache,$prefix));
        });
        //add new type session
        Session::extend('memcache', function($app){
            $manager = new SSessionMemcacheDriver($app);
            return $manager->driver('memcache');
        });
        //add new blade style
        Blade::extend(function($value, $compiler){
            $value = preg_replace("/@set\('(.*?)'\,(.*)\)/", '<?php $$1 = $2; ?>', $value);
            $value = preg_replace('/@unset\((?:\$|(?:\'))(.*?)(?:\'|)\)/', '<?php unset(\$$1); ?>', $value);
            $value = preg_replace('/(\s*)@(break|continue)(\s*)/', '$1<?php $2; ?>$3', $value);
            return $value;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
