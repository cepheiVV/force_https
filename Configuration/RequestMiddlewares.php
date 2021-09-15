<?php

return [
    'frontend' => [
        'itsc/force-https' => [
            'target' => \ITSC\ForceHttps\Middleware\Frontend\ForceHttps::class,
            'before' => [
                'typo3/cms-frontend/site',
            ],
        ],
    ],
];