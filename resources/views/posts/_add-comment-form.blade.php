{{-- _file-name is a way to say that this is a part a component not a view --}}
@auth
    <x-panel>
        <form class="" method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img class="rounded-full" src="https://i.pravatar.cc/50?u={{ auth()->id() }}" alt="" width="50"
                    height="50" />
                <h2 class="ml-3"> What to participate?</h2>
            </header>

            <textarea required name="body" class="p-3 m-2 w-full rounded-xl text-sm focus:outline-none focus:ring mt-4"
                cols="10" rows="5" placeholder="Quick think something to say!"></textarea>


            @error('body')
                <span class="text-red-500 text-xm"> {{ $message }}</span>
            @enderror



            <div class="border-t-2 flex justify-end mt-6">
                <button
                    class="bg-blue-500 font-semibold hover:bg-blue-800 px-10 py-2 rounded-2xl text-white text-xs uppercase mt-4"
                    type="submit">Post</button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a class="hover:underline" href="/reg/register">Register</a> or <a class="hover:underline" href="/reg/login">Log
            in</a> to leave a comment.
    </p>

@endauth
