<add-to-compare v-slot="addToCompare" id="{{ $product->entity_id }}">
    <div>
        <x-rapidez::button.outline v-on:click.prevent="addToCompare.toggleCompare">
            <span v-if="addToCompare.inCompare">{{ __('Remove from compare') }}</span>
            <span v-else>{{ __('Add to compare') }}</span>
        </x-rapidez::button.outline>
    </div>
</add-to-compare>
