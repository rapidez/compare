<add-to-compare v-slot="addToCompare" :id="item.entity_id">
    <x-input.checkbox v-bind:checked="addToCompare.inCompare" v-on:change="addToCompare.toggleCompare()">
        <span class="text-xs font-medium text-muted md:text-sm">@lang('Compare this product')</span>
    </x-input.checkbox>
</add-to-compare>
