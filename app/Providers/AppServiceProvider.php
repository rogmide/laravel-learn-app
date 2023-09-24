<?php

namespace App\Providers;

use App\Services\Newsletter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // This is like a container we store stuff here
        // that are store and we can use in the app
        // app()->bind('foo', function () {
        //     return 'bar';
        // });

        // app()->bind(Newsletter::class, function(){
        //     $client = new \MailchimpMarketing\ApiClient();

        //     $client->setConfig([
        //         'apiKey' => config('services.mailchimp.key'),
        //         'server' => 'us9'
        //     ]);

        //     return new Newsletter($client);
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
