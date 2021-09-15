<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Force HTTPS',
    'description' => 'Middleware to force HTTPS',
    'category' => 'misc',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4'
        ]
    ],
    'autoload' => [
        'psr-4' => [
            'ITSC\\ForceHttps\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'version' => '1.1.0',
];

