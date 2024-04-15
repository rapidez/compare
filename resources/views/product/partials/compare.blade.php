<add-to-compare v-slot="addToCompare" id="{{ $product->entity_id }}">
    <div>
<<<<<<< HEAD
        <x-rapidez::button.outline @click.prevent="addToCompare.addProduct">
            {{ __('Add to compare') }}
=======
        <x-rapidez::button.outline @click.prevent="addToCompare.toggleCompare">
            <span v-if="addToCompare.inCompare">{{ __('Remove from compare') }}</span>
            <span v-else>{{ __('Add to compare') }}</span>
>>>>>>> 250fc7d5352d5456518676f846b6d2b2c5601c26
        </x-rapidez::button.outline>
    </div>
</add-to-compare>