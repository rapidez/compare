<add-to-compare v-slot="addToCompare" id="{{ $product->entity_id }}">
    <div>
        <x-rapidez::button.outline @click.prevent="addToCompare.addProduct">
            {{ __('Add to compare') }}
        </x-rapidez::button.outline>
    </div>
</add-to-compare>