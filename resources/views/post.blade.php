<x-layout>


    <article>
        <h2>
            {!! $post->title !!}
        </h2>

        <div>
            {!! $post->body !!}
        </div>
    </article>

    <div class="move-down">
        <a href="/">Go Back</a>
    </div>

</x-layout>
