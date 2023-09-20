<x-layout>

    @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())
            <x-posts-grid :posts='$posts' />

            {{ $posts->links() }}
        @else
            <p>No posts yet. Please check back later.
        @endif
    </main>

</x-layout>
