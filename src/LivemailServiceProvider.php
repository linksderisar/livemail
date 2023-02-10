<?php

namespace Linksderisar\Livemail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Linksderisar\Livemail\Http\Livewire\Livemail;
use Livewire\Livewire;

class LivemailServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/livemail.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations/');
        $this->loadViewsFrom(__DIR__.'/views', 'livemail');

        //
        Livewire::component('linksderisar::livemail', Livemail::class);

        config([
            'mail.mailers.livemail' => ['transport' => 'livemail'],
        ]);

        Mail::extend('livemail', function (array $config = []) {
            return new LiveMailTransport();
        });
    }
}
