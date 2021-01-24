<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

define('MATERIAL', 20);
define('TEXTILE', 21);
define('FOOD', 22);

define('EMAIL', 'msmebusinessmatching@gmail.com');
define('COMPANY_UPLOAD', 18);
define('MEDIA_TYPE', json_encode(
    array(
        'image' => array('field_name' => 'image_media', 'extension' => array("jpg", "gif", "png", "jpeg"), 'max_size' => 5000000)
    )
));


define('PRODUCT', json_encode(
	array(
		'411',
		'412',
		'421',
		'422',
		'431',
		'432',
		'441',
		'442',
		'451',
		'452',
		'461',
		'462',
	)
));


define('PROCESSING', json_encode(
	array(
		'511',
		'512',
		'521',
		'522',
		'531',
		'532',
		'541',
		'542',
		'551',
		'552',
		'561',
		'562',
	)
));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
