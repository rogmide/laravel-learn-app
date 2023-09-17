@props(['posts'])

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
            <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
        @endforeach
    </div>
@endif
