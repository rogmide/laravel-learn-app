<x-layout>


    <article>
        <h2>
            {!! $post->title !!}
        </h2>

        <p>
            By <a href="#"> {{ $post->user->name }}</a> in <a
                href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}
            </a>
        </p>

        <div>
            {!! $post->body !!}
        </div>
    </article>

    <div class="move-down">
        <a href="/">Go Back</a>
    </div>

</x-layout>
