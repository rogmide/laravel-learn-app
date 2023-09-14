@extends ('layout')

@section('banner')
    <h1>My Blog</h1>
@endsection

@section('content')
    @if (false)
        <h2>Something</h2>
    @endif

    @foreach ($posts as $post)
        <h2>
            <a href="/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h2>
        <div>
            {{ $post->excerpt }}
        </div>
    @endforeach
@endsection
