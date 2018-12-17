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
        'domain' => env('MAILGUN_DOMAIN','sandbox08181fd3e9184576a8ffa940461969a6.mailgun.org'),
        'secret' => env('MAILGUN_SECRET','cf014b8270bd874d066f652853c454ab-b3780ee5-d386e54e'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'https://api.mailgun.net/v3/sandbox08181fd3e9184576a8ffa940461969a6.mailgun.org'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),         // Your FACEBOOK Client ID
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'), // Your GitHub Client Secret
    'redirect' => env('APP_URL'),
],

];
