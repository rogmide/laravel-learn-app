<x-layout>

    @foreach ($posts as $post)
        <h2>
            <a href="/{{ $post->id }}">
                {!! $post->title !!}
            </a>
        </h2>
        <div>
            {{ $post->excerpt }}
        </div>
    @endforeach

</x-layout>
