@props(['name'])
<x-dropdown>

    <x-slot name="trigger">
        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
            <div style="float:right;
            margin-right:150px;" class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
        <button  class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currents) ? ucwords($currents->name) : 'Categories' }}

            @if (@$name === 'down-arrow')
            <svg  class="absolute pointer-events-none bg-transparent placeholder-black font-semibold text-sm" width="22" height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        @endif
            </button>
        </div>
        </div>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="/categories/{{ $category->slug }}"
            :active='request()->is("categories/{$category->slug}")'
        >{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach
</x-dropdown>