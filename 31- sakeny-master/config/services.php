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
        'client_id' => env('Facebook_id'),
        'client_secret' => env('Facebook_secret'),
        'redirect' => env('Facebook_callback'),
    ],

    'linkedin' => [
        'client_id' => env('Linkedin_id'),
        'client_secret' => env('Linkedin_secret'),
        'redirect' => env('Linkedin_callback'),
    ],

    'google' => [
        'client_id' => env('Google_id'),
        'client_secret' => env('Google_secret'),
        'redirect' => env('Google_callback'),
    ],

];
