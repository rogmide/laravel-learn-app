<?php

namespace App\Services;


class Newsletter
{

    public function subscribe($email, $list)
    {

        // Null safe asigmen operator
        // $list ??= IF THIS I NULL THEN
        // set up the valor to what is on the right side of the =
        $list ??= config(config('services.mailchimp.lists.subscribers'));

        return  $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed"
        ]);
    }

    protected function client()
    {
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us9'
        ]);

        return $mailchimp;
    }
}
