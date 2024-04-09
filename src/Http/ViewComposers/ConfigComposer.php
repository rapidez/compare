<?php

namespace Rapidez\Compare\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Config;

class ConfigComposer
{
    public function compose(View $view)
    {
        Config::set('frontend.queries.compare', view('rapidez-compare::product.queries.compare')->renderOneliner());
        Config::set('frontend.translations.compare', __('rapidez-compare::frontend.compare'));
    }
}