<?php

return [
    'transport' => [
        'type' => 'smtp',
        'host' => env('EMAIL_HOST'),
        'port' => 465,
        'security' => true,
        'auth' => true,
        'username' => env('EMAIL_USERNAME'),
        'password' => env('EMAIL_PASSWORD'),
    ],
];
