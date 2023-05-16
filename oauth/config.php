<?php


$config = [
    'Google' => [
        'id' => '331241618581-6h5d465oq6e37d1400lmmrkgvl6culu8.apps.googleusercontent.com',
        'secret' => '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',
        'scope' => 'userprofile.email',
        'callback' => 'https://localhost/oauth/controllers/google/',
    ],
    'Facebook' => [
        'id' => '611589744195632', 
        'secret' => '8efdfcba40244ceadc99a05cd3010205',
        'clientToken' => "11f1638a23aad50e3f92876f74b7af6a",
        "callback" => "https://localhost/oauth/controllers/facebook/"
    ],

    'Instagram' => [
        'id' => '921112142434784', 
        'secret' => 'c22319eb67b15610ce836d299a045827',
        "callback" => "https://localhost/oauth/controllers/facebook/"
    ],
];

return $config;