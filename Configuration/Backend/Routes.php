<?php

use GeorgRinger\Doc\Controller\DocServeController;

return [
    'doc_serve' => [
        'path' => '/doc/serve/{segment_01}',
        'access' => 'public',
        'target' => DocServeController::class . '::mainAction'
    ],
];
