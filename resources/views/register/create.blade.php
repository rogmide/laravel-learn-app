<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 border-gray-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="POST" action="/reg/register">

                {{-- Adding Security to the Form --}}
                @csrf
                {{-- Adding Security to the Form --}}
                {{-- Without that will give static Code Error 419 --}}

                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name"
                        value="{{ old('name') }}" required>


                    {{-- Error Handeling Start --}}
                    @error('name')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}

                </div>
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        Username
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username"
                        value="{{ old('username') }}" required>


                    {{-- Error Handeling Start --}}
                    @error('username')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}

                </div>
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                        value="{{ old('') }}" required>

                    {{-- Error Handeling Start --}}
                    @error('password')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}

                </div>
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email"
                        value="{{ old('email') }}" required>


                    {{-- Error Handeling Start --}}
                    @error('email')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    {{-- Error Handeling End --}}

                </div>


                <div class="mb-6 mt-10">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>

                {{-- $errors variable allways is aviable to use --}}
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif


            </form>
        </main>
    </section>
</x-layout>
