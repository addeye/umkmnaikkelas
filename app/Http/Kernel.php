<?php

namespace App\Http;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule) {
		$path = base_path();
		$schedule->call(function () use ($path) {
			if (file_exists($path . '/queue.pid')) {
				$pid = file_get_contents($path . '/queue.pid');
				$result = exec("ps -p $pid --no-heading | awk '{print $1}'");
				$run = $result == '' ? true : false;
			} else {
				$run = true;
			}
			if ($run) {
				$command = '/usr/bin/php -c ' . $path . '/php.ini ' . $path . '/artisan queue:listen --tries=3 > /dev/null & echo $!';
				$number = exec($command);
				file_put_contents($path . '/queue.pid', $number);
			}
		})->name('monitor_queue_listener')->everyFiveMinutes();
	}

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * These middleware are run during every request to your application.
	 *
	 * @var array
	 */
	protected $middleware = [
		\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
		\Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
		\App\Http\Middleware\TrimStrings::class,
		\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
		// \App\Http\Middleware\Cors::class, // Place Cors middleware here
	];

	/**
	 * The application's route middleware groups.
	 *
	 * @var array
	 */
	protected $middlewareGroups = [
		'web' => [
			\App\Http\Middleware\EncryptCookies::class,
			\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			\Illuminate\Session\Middleware\StartSession::class,
			// \Illuminate\Session\Middleware\AuthenticateSession::class,
			\Illuminate\View\Middleware\ShareErrorsFromSession::class,
			\App\Http\Middleware\Cors::class, // Place Cors middleware here
			\App\Http\Middleware\VerifyCsrfToken::class,
			\Illuminate\Routing\Middleware\SubstituteBindings::class,
			// \UxWeb\SweetAlert\ConvertMessagesIntoSweatAlert::class,
		],

		'api' => [
			'throttle:60,1',
			'bindings',
		],
	];

	/**
	 * The application's route middleware.
	 *
	 * These middleware may be assigned to groups or used individually.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
		'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
		'can' => \Illuminate\Auth\Middleware\Authorize::class,
		'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
		'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
		'sweetalert' => \UxWeb\SweetAlert\ConvertMessagesIntoSweatAlert::class,
		'admin' => \App\Http\Middleware\AdminMiddleware::class,
		'calon' => \App\Http\Middleware\CalonMiddleware::class,
		'umkm' => \App\Http\Middleware\UmkmMiddleware::class,
		'pendamping' => \App\Http\Middleware\PendampingMiddleware::class,
		'cors' => \App\Http\Middleware\Cors::class,
	];
}
