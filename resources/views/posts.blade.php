<x-layout>

    @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())

            <x-post-feature-card :post="$posts[0]" />

            @if ($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6">

                    {{-- <x-post-card :post="$posts[1]" />
            <x-post-card :post="$posts[2]" /> --}}
                    @foreach ($posts->skip(1) as $post)
                        {{-- Create a $attribute->merge() in the other
                            on the file that your passing and
                            we can use class="anything css that we need to change
                            like next line" --}}
                        <x-post-card :post="$post" class="col-span-2" />
                    @endforeach
            @endif

            </div>

            <div class="lg:grid lg:grid-cols-3">
                {{-- <x-post-card />
                     <x-post-card />
                     <x-post-card /> 
                --}}
            </div>
        @else
            <p>No posts yet. Please check back later.

        @endif
    </main>

</x-layout>
