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
                                            <a href="/admin/posts/{{ $post->id }}" class="text-blue-500">Edit</a>
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
