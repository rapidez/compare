<?php

namespace Rapidez\Compare;

use Illuminate\Support\ServiceProvider;


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
            ->bootViews();
    }

    protected function bootTranslations(): self
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'rapidez-compare');

        return $this;
    }

    public function registerConfig(): static
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rapidez/compare.php', 'rapidez.compare');

        return $this;
    }

    public function bootRoutes(): static
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        return $this;
    }

    public function bootViews(): static
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rapidez-compare');

        return $this;
    }
}