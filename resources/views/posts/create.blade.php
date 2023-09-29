<x-layout>
    <section class="px-6 py-8">

        <x-panel class="max-w-sm mx-auto">

            <h1 class="font-bold">
                Publish new Post
            </h1>
            {{-- 
                enctype="multipart/form-data"
             is for when we uploading a file
              --}}
            <form method="POST" action="/admin/posts/create" enctype="multipart/form-data">

                {{-- Adding Security to the Form --}}
                @csrf
                {{-- Adding Security to the Form --}}
                {{-- Without that will give static Code Error 419 --}}

                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title"
                        value="{{ old('title') }}" required>


                    {{-- Error Handeling Start --}}
                    @error('title')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}

                </div>
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug"
                        value="{{ old('slug') }}" required>


                    {{-- Error Handeling Start --}}
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}

                </div>
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                        Thumbnail
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail"
                        value="{{ old('thumbnail') }}" required>


                    {{-- Error Handeling Start --}}
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}

                </div>



                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Excerpt
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full" type="text" name="excerpt" id="excerpt" required>{{ old('excerpt') }}</textarea>


                    {{-- Error Handeling Start --}}
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}
                </div>
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full" type="text" name="body" id="body" required>{{ old('body') }}</textarea>

                    {{-- Error Handeling Start --}}
                    @error('body')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}
                </div>
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                        Category
                    </label>

                    <select class="border border-gray-400 p-2 w-full" type="text" name="category_id" id="category_id"
                        value="{{ old('category') }}" required>

                        @foreach (\App\Models\Category::all() as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach

                    </select>


                    {{-- Error Handeling Start --}}
                    @error('body')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}
                </div>

                <div class="mb-6 mt-10">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">PUBLISH</button>
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
