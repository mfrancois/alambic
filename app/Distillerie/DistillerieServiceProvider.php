<?php namespace Distillerie;

use Illuminate\Support\ServiceProvider;

class DistillerieServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['files'] = $this->app->share(function() { return new Libraries\Filesystem\Filesystem; });
        $this->app['menu'] = $this->app->share(function() { return new Libraries\Menu\Menu; });
        $this->app['markdown'] = $this->app->share(function() { return new Libraries\Markdown\Markdown; });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('files','menu','markdown');
    }

}