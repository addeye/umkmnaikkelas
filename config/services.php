<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '306559719775700',
        'client_secret' => '792da90588abd7960039ddef791442a3',
        'redirect' => 'http://localhost:8000/callback/facebook',
    ],

    'twitter' => [
        'client_id' => 'XrgVKFmZLbhmFnThAPxJiJxYC',
        'client_secret' => '6nFQ9DOjNy73uev2Lb9WcfIprC8RMwl1TWFnd0nC3qHV02MXEw',
        'redirect' => 'http://localhost:8000/callback/twitter',
    ],

];
