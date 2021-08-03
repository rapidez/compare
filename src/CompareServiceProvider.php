<?php

namespace Rapidez\Compare;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Rapidez\Core\Models\Product;
use Rapidez\Core\Models\Scopes\Product\WithProductAttributesScope;

class CompareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rapidez');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez'),
        ], 'views');

        View::composer(['rapidez::category.overview', 'rapidez::search.overview', 'rapidez::compare.overview'], function ($view) {
            if ($productIds = session('compare')) {
                $products = $this->getComparedProductsArray($productIds);
            }

            config(['frontend.compare' => $products ?? []]);
        });

        Route::middleware('web')->group(function () {
            Route::get('compare', function () {
                return view('rapidez::compare.overview');
            });

            Route::post('compare', function (Request $request) {
                abort_unless(Product::exist($request->product), 404);
                $request->session()->push('compare', $request->product);

                return $this->getComparedProductsArray($request->session()->get('compare'));
            })->name('compare.store');

            Route::delete('compare/{product}', function (Request $request, $product) {
                $compare = $request->session()->get('compare');
                $compare = array_values(array_filter($compare, fn ($id) => $id != $product));
                $request->session()->put('compare', $compare);

                return $this->getComparedProductsArray($compare);
            })->name('compare.destroy');
        });
    }

    protected function getComparedProductsArray(array $productIds): array
    {
        return Product::byIds($productIds)
            ->withoutGlobalScopes()
            ->withGlobalScope(WithProductAttributesScope::class, new WithProductAttributesScope())
            ->selectOnlyComparable()
            ->get()
            ->keyBy('id')
            ->toArray();
    }
}
