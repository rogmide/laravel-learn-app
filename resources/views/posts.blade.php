<x-layout>

    @foreach ($posts as $post)
        <h2>
            <a href="/{{ $post->slug }}">
                {!! $post->title !!}
            </a>
        </h2>

        <p>
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

        <div>
            {!! $post->excerpt !!}
        </div>
    @endforeach

</x-layout>
