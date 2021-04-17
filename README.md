# Rapidez Compare

## Installation

```
composer require rapidez/compare
```

## Info

The compared products are available at `this.$root.config.compare` on the category, search and compare page which is reactive.

### Checkbox

There is a `Checkbox.vue` component which can be used. Just register it in the `app.js`:
```
Vue.component('product-compare-checkbox', require('Vendor/Rapidez/Compare/src/components/Checkbox.vue').default);
```
This component can be customized with `classLabel` and `classCheckbox` props. If it does not fit your needs you can create your own Vue component and use the mixin: `CheckboxLogic.js` for the functionality as done within the component. The product ID should be passed as component key. Example usage within the `category/partials/listing/item.blade.php`:
```
<product-compare-checkbox
    v-if="$root.config.compare"
    class="absolute right-0 top-0 p-1 mt-3 hidden group-hover:flex items-center flex-row-reverse bg-gray-100 text-gray-500 rounded-l lowercase"
    :key="item.id"
    class-checkbox="ml-1"
/>
```

### Widget

There is a `Widget.vue` component which can be used. Just register it in the `app.js`:
```
Vue.component('product-compare-widget', require('Vendor/Rapidez/Compare/src/components/Widget.vue').default);
```
This component can be customized with multiple class props. It's also possible to overwrite the product part of it with the slot. If it does not fit your needs you can create your own Vue component and use the mixin: `Methods.js` for the functionality as done within the component. Most likely the component is displayed fixed so render it at the end of the html with for example the `page_end` stack on the `category/overview.blade.php` and `search/overview.blade.php`:
```
@push('page_end')
    <product-compare-widget
        class-wrapper="fixed right-0 bottom-0 mr-16 p-3 bg-blue-500 rounded-t"
    />
@endpush
```
The props should be in kebab-case in Blade.

### Overview

Just like the others there is a `Overview.vue` component:
```
Vue.component('product-compare-overview', require('Vendor/rapidez/compare/src/components/Overview.vue').default)
```
And because this is a whole page there is also a Blade view. To overwrite that view you've to publish it with 
```
php artisan vendor:publish --provider="Rapidez\Compare\CompareServiceProvider"
```

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
