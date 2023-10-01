<x-layout>
    <section class="px-6 py-8">

        <x-panel class="max-w-sm mx-auto">

            <h1 class="font-bold">
                Edit: {{ $post->title }}
            </h1>
            {{-- 
                enctype="multipart/form-data"
             is for when we uploading a file
              --}}
            <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">

                {{-- Adding Security to the Form --}}
                @csrf
                {{-- Adding Security to the Form --}}
                {{-- Without that will give static Code Error 419 --}}

                {{-- This is a way to tell laravel that we 
                    are sending a patch request --}}
                @method('PATCH')


                <x-form.input name='title' value="{{ $post->title }}" />
                <x-form.input name='slug' value="{{ $post->slug }}" />
                <x-form.input name='thumbnail' value="{{ $post->thumbnail }}" />
                <x-form.textarea name='excerpt'>{{ $post->excerpt }}</x-form.textarea>
                <x-form.textarea name='body'>{{ $post->body }}</x-form.textarea>



                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                        Category
                    </label>

                    <select class="border border-gray-400 p-2 w-full" type="text" name="category_id" id="category_id"
                        required>

                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $post->category_id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}</option>
                        @endforeach

                    </select>


                    {{-- Error Handeling Start --}}
                    @error('category')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}
                </div>

                <div class="mb-6 mt-10">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Update</button>
                </div>

                {{-- $errors variable allways is aviable to use --}}
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif

        </x-panel>
        </form>
    </section>
</x-layout>
