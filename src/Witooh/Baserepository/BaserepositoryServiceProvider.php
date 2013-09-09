<?php namespace Witooh\BaseRepository;

use Illuminate\Support\ServiceProvider;

class BaserepositoryServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
//        $this->app->singleton('Witooh\Base\Repositories\IBaseRepository', 'Witooh\Base\Repositories\EloquentBaseRepository');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}