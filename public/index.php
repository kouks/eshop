<?php

/**
 * Start the session
 */

session_start();

/**
 * Require the composer autoload file.
 */

require '../vendor/autoload.php';

/**
 * Booting the app.
 */

$app = new Lib\Core\Application(
    realpath(__DIR__.'/../')
);

/**
 * Capturing the request and sending a response.
 */

$kernel = app(Lib\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    Lib\Http\Request::capture()
);

$response->send();
