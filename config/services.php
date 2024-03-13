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
        'client_id' => '1045145738952502',
        'client_secret' => 'daf10f7c20c4b2d69eab171554fd3a30',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'eJo5wUix1PA5nOhlP9eMApvme',
        'client_secret' => '2ROVsqBqaNtvUfZSUj8MColRjSowftDF12vf4mN51SE9JPs3Cz',
        'redirect' => 'http://127.0.0.1:8000/login/twitter/callback',
    ],







];
