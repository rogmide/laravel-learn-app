@props(['name'])

<div class="mb-6 mt-10">
    <x-form.lable name='{{ $name }}' />

    <input class="border border-gray-400 p-2 w-full" type="text" name="{{ $name }}" id="{{ $name }}"
        required {{ $attributes(['value' => old($name)]) }}>


    <x-form.error name='{{ $name }}' />

</div>
