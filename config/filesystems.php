<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        // Hier bij wordt alle foto van de cars (الاقسام) opgeslaagd
        'cars' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/cars/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],
        // Hier bij wordt alle foto van de articles (التجار) opgeslaagd
        'articles' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/articles/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public'
        ],
        // Hier bij wordt alle foto van de pagesopgeslaagd
        'pages' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/pages/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public'
        ],
        // Hier bij wordt alle foto van de sections  opgeslaagd
        'sections' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/sections/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public'
        ],
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
