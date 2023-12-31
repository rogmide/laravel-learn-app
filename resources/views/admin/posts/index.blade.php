<x-layout>

    <section class="flex justify-center px-6 py-8">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="text-left text-sm font-light">
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4">{{ $post->title }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">Publish</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-blue-500">
                                            {{-- Sending $post->id to backend
                                                laravel magicly knows that what
                                                we need a Post and using the id will retived
                                                from DB --}}
                                            <a href="/admin/posts/{{ $post->id }}/edit"
                                                class="text-blue-500">Edit</a>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{-- Sending $post->id to backend
                                                laravel magicly knows that what
                                                we need a Post and using the id will retived
                                                from DB --}}
                                            <form action="/admin/posts/{{ $post->id }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </section>
</x-layout>
