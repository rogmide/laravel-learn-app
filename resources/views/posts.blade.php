<x-layout>

    @foreach ($posts as $post)
        <h2>
            <a href="/{{ $post->slug }}">
                {!! $post->title !!}
            </a>
        </h2>
        <div>
            {!! $post->excerpt !!}
        </div>
    @endforeach

</x-layout>
