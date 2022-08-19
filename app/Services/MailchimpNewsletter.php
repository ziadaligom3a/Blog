<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter{


    
    public function __construct(protected ApiClient $client)
    {
        //
    }

    public function subscribe($email){

        $response = $this->client->lists->addListMember(config('services.MAILCHIMP.list'),[

            'email_address' => $email,
            'status' => 'subscribed'
        ]);
      return $response;
    }

    



}

