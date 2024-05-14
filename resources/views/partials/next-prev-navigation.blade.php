<x-rapidez::button.primary
    class="absolute top-10 sm:top-14 size-10 sm:left-1/3 lg:left-1/4 xl:left-[20%] z-10 rounded-full !p-0"
    v-if="showLeft"
    v-on:click="navigate(currentSlide - 1)"
>
    <x-heroicon-o-arrow-left stroke-width="2" class="text-white size-4"/>
</x-rapidez::button.primary>

<x-rapidez::button.primary
    class="absolute top-10 sm:top-14 right-0 size-10 flex z-10 rounded-full !p-0"
    v-if="showRight"
    v-on:click="navigate(currentSlide + 1)"
>
    <x-heroicon-o-arrow-right stroke-width="2" class="text-white size-4"/>
</x-rapidez::button.primary>
