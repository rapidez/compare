<?php

namespace Rapidez\Compare;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Rapidez\Compare\Http\ViewComposers\ConfigComposer;


class RapidezCompareServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
    }

    public function boot(): void
    {
        $this->bootRoutes()
            ->bootTranslations()
            ->bootViews()
            ->bootComposers();
    }

    protected function bootComposers(): static
    {
        View::composer('rapidez::layouts.app', ConfigComposer::class);

        return $this;
    }

    protected function bootTranslations(): static
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'rapidez-compare');

        return $this;
    }

    protected function registerConfig(): static
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rapidez/compare.php', 'rapidez.compare');

        return $this;
    }

    protected function bootRoutes(): static
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        return $this;
    }

    protected function bootViews(): static
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rapidez-compare');

        return $this;
    }
}