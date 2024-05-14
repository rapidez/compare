@extends('rapidez::layouts.app')

@section('title', __('Product compare list'))
@section('description', __('Page to view compare list of the user'))

@section('content')
    <div class="container">
        <h1 class="mb-5 text-3xl font-bold">@lang('Compare')</h1>
        <product-compare v-slot="compare" v-cloak>
            <div class="relative text-sm">
                <div class="absolute left-0 top-0 bottom-5 w-1/2 sm:w-1/3 lg:w-1/4 xl:w-1/5 bg-white z-10 max-sm:hidden"></div>
                <slider container-reference="container">
                    <div class="overflow-hidden" slot-scope="{ showLeft, showRight, currentSlide, navigate }">
                        <div class="absolute inset-0 top-14 sm:left-1/3 lg:left-1/4 xl:left-[20%] flex">
                            <button
                                class="sticky z-50 top-14 rounded-full border size-12 flex justify-center items-center bg-white hover:bg-inactive hover:text-white transition"
                                v-if="showLeft"
                                v-on:click="navigate(currentSlide - 1)"
                            >
                                <x-heroicon-o-arrow-left class="size-4"/>
                            </button>

                            <button
                                class="ml-auto sticky z-50 top-14 rounded-full border size-12 flex justify-center items-center bg-white hover:bg-inactive hover:text-white transition"
                                v-if="showRight"
                                v-on:click="navigate(currentSlide + 1)"
                            >
                                <x-heroicon-o-arrow-right class="size-4"/>
                            </button>
                        </div>
                        <div class="overflow-x-auto overflow-y-hidden pb-5 -mt-px max-sm:-ml-3 -mr-px snap-x" ref="slider">
                            <div class="flex flex-col">
                                <div class="flex *:px-3.5 *:pb-3 *:w-1/2 sm:*:w-1/3 *:lg:w-1/4 *:xl:w-1/5 *:shrink-0" ref="container">
                                    <div></div>
                                    <div
                                        class="relative flex flex-col snap-end max-sm:-translate-x-full"
                                        v-for="item, key in compare.items"
                                    >
                                        <button
                                            class="absolute top-1 right-1 cursor-pointer p-2.5 hover:bg-inactive-100 transition rounded-full group"
                                            v-on:click.prevent="compare.remove(item.uid)"
                                        >
                                            <x-heroicon-o-x-mark stroke-width="3" class="size-4 text-inactive group-hover:text-neutral transition" />
                                        </button>
                                        <img class="object-contain h-28 sm:h-40" :src="item.product.image.url" :alt="item.product.image.name">
                                        <a class="mt-1 font-semibold hover:underline" :href="item.product.url_key">
                                            @{{ item.product.name }}
                                        </a>
                                    </div>
                                </div>
                                <div
                                    v-for="attribute, key in compare.attributes"
                                    class="flex *:py-2.5 *:px-3.5 *:w-1/2 sm:*:w-1/3 *:lg:w-1/4 *:xl:w-1/5 *:shrink-0 *:border-t border-t *:-mt-px"
                                    :class="{ '*:!border-t-0 !border-t-0 ': key === 0 }"
                                >
                                    <strong class="absolute left-0 !pl-0 z-10 truncate block max-sm:pt-3.5 max-sm:w-auto max-sm:right-0 pointer-events-none font-semibold">
                                        @{{ attribute.label }}
                                    </strong>
                                    <div></div>
                                    <div v-for="product, key in compare.items" class="flex !px-0 !py-0 max-sm:-translate-x-full">
                                        <div class="sticky w-px top-0 left-1/2 sm:left-1/3 lg:left-1/4 xl:left-[20%] bg-inactive-110 shrink-0 max-sm:hidden"></div>
                                        <div class="pb-1.5 px-3 sm:py-2.5 sm:px-3.5 max-sm:mt-9 max-sm:border-l">@{{ product.attributes.find((attr) => attr.code === attribute.code)?.value }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </slider>
            </div>
        </product-compare>
    </div>
@endsection
