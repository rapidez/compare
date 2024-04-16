<add-to-compare v-slot="addToCompare" :id="item.entity_id">
    <x-input.checkbox v-bind:checked="addToCompare.inCompare" @change="addToCompare.toggleCompare()">
        <span class="text-xs font-medium text-inactive md:text-sm">@lang('Compare this product')</span>
    </x-input.checkbox>
</add-to-compare>
