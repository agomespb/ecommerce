<?php namespace AGCommerce\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
//        $this->app->bind('path.public', function() {
//            return "/var/www/ProjectsL5/ecommerce/public_html";
//        });

//        dd(public_path());

		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'AGCommerce\Services\Registrar'
		);

	}

}
