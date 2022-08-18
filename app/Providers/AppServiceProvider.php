<?php

namespace App\Providers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;
use PhpParser\Node\Expr\New_;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


        app()->bind(Newsletter::class,function(){
        
        
        $client = (new ApiClient)->setConfig([
            'apiKey' => config('services.MAILCHIMP.key'),
            'server' => 'us14'
        ]);
        
            return new MailchimpNewsletter($client);
        });


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
