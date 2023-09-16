<x-layout>

    @foreach ($posts as $post)
        <h2>
            <a href="/{{ $post->slug }}">
                {!! $post->title !!}
            </a>
        </h2>

        <p>
            By <a href="/authors/{{ $post->author->username }}"> {{ $post->author->name }}</a> in <a
                href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}
            </a>
        </p>

        <div>
            {!! $post->excerpt !!}
        </div>
    @endforeach

</x-layout>
