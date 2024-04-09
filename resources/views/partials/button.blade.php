<product-compare v-slot="compare">
    <div class="fixed bottom-10 right-10" v-if="compare.items">
        <x-rapidez::button.outline class="relative bg-white" :href="route('rapidez-compare::compare')">
            {{ __('Compare') }}
            <div class="text-white bg-primary rounded-full px-2 absolute -right-2 -top-2" v-text="Math.round(compare.count)"></div>
        </x-rapidez::button.outline>
    </div>
</product-compare>