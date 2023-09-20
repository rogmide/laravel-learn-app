<x-dropdown>
    {{-- Trigger --}}
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left lg:inline-flex">

            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-down-arrow class="absolute pointer-events-none">
            </x-down-arrow>

        </button>
    </x-slot>

    {{-- Links --}}

    {{-- Passing Variables to the Component --}}
    <x-dropdown-item href="/" :active="request()->routeIs('home')">
        All
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item href="/categories/{{ $category->slug }}" :active="isset($currentCategory) && $currentCategory->is($category)">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach

</x-dropdown>
