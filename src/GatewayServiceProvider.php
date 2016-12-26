<?php
namespace Nopaad\PasargadBank;
class GatewayServiceProvider extends \Illuminate\Support\ServiceProvider
{

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../config/laravel-pasargad-bank.php' => config_path('laravel-pasargad-bank.php'),
		]);
	}


	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
