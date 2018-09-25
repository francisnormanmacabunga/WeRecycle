<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admins',
        ],

        'donor' => [
            'driver' => 'session',
            'provider' => 'donors',
        ],

        'donor-api' => [
            'driver' => 'token',
            'provider' => 'donors',
        ],

<<<<<<< HEAD
        'activitycoordinator' => [
            'driver' => 'session',
            'provider' => 'activitycoordinators',
        ],

        'activitycoordinator-api' => [
            'driver' => 'token',
            'provider' => 'activitycoordinators',
=======
        'programdirector' => [
            'driver' => 'session',
            'provider' => 'programdirectors',
        ],

        'programdirector-api' => [
            'driver' => 'token',
            'provider' => 'programdirectors',
>>>>>>> f9adf8b4020331dffa21d8cdc90e1fc82089fb50
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\admin::class,
        ],

        'donors' => [
            'driver' => 'eloquent',
            'model' => App\donor::class,
        ],

<<<<<<< HEAD
        'activitycoordinators' => [
            'driver' => 'eloquent',
            'model' => App\activitycoordinator::class,
        ],

=======
        'programdirectors' => [
            'driver' => 'eloquent',
            'model' => App\programdirector::class,
        ],
>>>>>>> f9adf8b4020331dffa21d8cdc90e1fc82089fb50
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'donors' => [
            'provider' => 'donors',
            'table' => 'password_resets',
            'expire' => 60,
        ],

<<<<<<< HEAD
        'activitycoordinators' => [
            'provider' => 'activitycoordinators',
=======
        'programdirectors' => [
            'provider' => 'programdirectors',
>>>>>>> f9adf8b4020331dffa21d8cdc90e1fc82089fb50
            'table' => 'password_resets',
            'expire' => 60,
        ],

<<<<<<< HEAD
=======

>>>>>>> f9adf8b4020331dffa21d8cdc90e1fc82089fb50
    ],

];
