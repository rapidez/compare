<product-compare v-slot="compare">
    <div class="fixed bottom-10 right-10 z-20" v-if="compare.items">
        <x-rapidez::button.outline class="relative bg-white" :href="route('rapidez-compare::compare')">
            {{ __('Compare') }}
            <div class="text-white bg-primary rounded-full aspect-square px-2 absolute right-0 top-0 flex translate-x-1/2 -translate-y-1/2">
                <span v-txt="Math.round(compare.count)" class="self-center">0</span>
            </div>
        </x-rapidez::button.outline>
    </div>
</product-compare>

