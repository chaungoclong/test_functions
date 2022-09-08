<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

const __CONFIG__ = [
    'DATABASE' => [
        'driver'    => 'mysql',
        'host'      => '127.0.0.1',
        'username'  => 'long',
        'password'  => 'tnt',
        'database'  => 'base_api',
        'port'      => 3306,
        'prefix'    => 'tnv_',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
    ],
    'OPTIONS'  => [
        'showSignature'         => true,
        'debugStatus'           => true,
        'debugLevel'            => 'info',
        'loggerPath'            => __DIR__ . '/../tmp/logs/',
        // Cache
        'cachePath'             => __DIR__ . '/../tmp/cache/',
        'cacheTtl'              => 3600,
        'cacheDriver'           => 'files',
        'cacheFileDefaultChmod' => 0777,
        'cacheSecurityKey'      => 'BACKEND-SERVICE',
        "google"                => [
            'clientId'     => '155325093042-nbjgo579ks85uk2ro509t1cous62pcmh.apps.googleusercontent.com',
            'clientSecret' => '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',
            'redirectUri'  => 'http://127.0.0.1:8000/test/social-login/test.php'
        ],
        "facebook"              => [
            'clientId'        => '580882566976721',
            'clientSecret'    => '5fadda916d65b876017ab71c4f8fe58e',
            'redirectUri'     => 'https://baseapi.test/test/social-login/test.php',
            'graphApiVersion' => 'v2.10',
        ],
        "instagram"             => [
            'clientId'     => '1518442855235506',
            'clientSecret' => '13e3dba84260b4f7e8ba2bd2a3f9ee8b',
            'redirectUri'  => 'https://baseapi.test/test/social-login/test.php',
            'host'         => 'https://api.instagram.com',  // Optional, defaults to https://api.instagram.com
            'graphHost'    => 'https://graph.instagram.com' // Optional, defaults to https://graph.instagram.com
        ],
        "linkedin"              => [
            'clientId'     => '78ead7tpb8uhna',
            'clientSecret' => '7fYI9slaNL1hj0RY',
            'redirectUri'  => 'https://baseapi.test/test/social-login/test.php',
        ],
        'github'                => [
            'clientId'     => 'Iv1.a650eda598f02226',
            'clientSecret' => '7b994070a9ec482f6bef10d9548158b9ff5dc278',
            'redirectUri'  => 'https://baseapi.test/test/social-login/test.php',
        ],
    ]
];

// Instantiate app
$app = AppFactory::create();

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});

$app->post('/api/category', function (Request $request, Response $response, array $args) {
    $categoryService = new \nguyenanhung\Backend\BaseAPI\Http\WebServiceCategory(__CONFIG__['OPTIONS']);
    $categoryService->setSdkConfig(__CONFIG__);
//    print_r($request->getParsedBody());
    $categoryService->setInputData($request->getParsedBody());
    $response->getBody()->write(json_encode($categoryService->list()->getResponse()));

    return $response->withHeader('Content-Type', 'application/json');
});

// Run application
$app->run();