<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // sqliteで外部キー制約を有効にする
        if (\DB::getDriverName() == 'sqlite') {
            \DB::statement(\DB::raw('PRAGMA foreign_keys=1'));
        }

        // グローバル変数 管理者のidを1とする
        config(['admin_id' => 1]);

        // herokuでhttps強制
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
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
