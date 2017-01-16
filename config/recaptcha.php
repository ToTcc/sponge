<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Keys
    |--------------------------------------------------------------------------
    |
    | Set the public and private API keys as provided by reCAPTCHA.
    |
    | In version 2 of reCAPTCHA, public_key is the Site key,
    | and private_key is the Secret key.
    |
    */
    'public_key'     => env('RECAPTCHA_PUBLIC_KEY', '6Lc6EyYTAAAAAJXuChNYckFj3q3VTyu83jEUlrsS'),
    'private_key'    => env('RECAPTCHA_PRIVATE_KEY', '6Lc6EyYTAAAAAHtov64dAiu7esKuWLYzX_IZMBWy'),

    /*
    |--------------------------------------------------------------------------
    | Template
    |--------------------------------------------------------------------------
    |
    | Set a template to use if you don't want to use the standard one.
    |
    */
    'template'    => '',

    /*
    |--------------------------------------------------------------------------
    | Driver
    |--------------------------------------------------------------------------
    |
    | Determine how to call out to get response; values are 'curl' or 'native'.
    | Only applies to v2.
    |
    */
    'driver'      => 'curl',

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | Various options for the driver
    |
    */
    'options'     => [

        'curl_timeout' => 1,

    ],

    /*
    |--------------------------------------------------------------------------
    | Version
    |--------------------------------------------------------------------------
    |
    | Set which version of ReCaptcha to use.
    |
    */

    'version'     => 2,

];
