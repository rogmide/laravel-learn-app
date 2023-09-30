@props(['name'])
{{-- Error Handeling Start --}}
@error($name)
    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
@enderror
{{-- Error Handeling End --}}
