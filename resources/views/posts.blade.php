<x-layout>

    @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        <x-post-feature-card :post="$posts[0]" />

        <div class="lg:grid lg:grid-cols-2">

            {{-- <x-post-card :post="$posts[1]" />
            <x-post-card :post="$posts[2]" /> --}}
            @foreach ($posts->skip(1) as $post)
                <x-post-card :post="$post" />
            @endforeach

        </div>

        <div class="lg:grid lg:grid-cols-3">
            {{-- <x-post-card />
            <x-post-card />
            <x-post-card /> --}}
        </div>
    </main>

</x-layout>
