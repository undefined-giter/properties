@php
$class ??= null;
@endphp

<div class="[form-check form-switch, $class]">
    <input type="hidden" value='0' name="{{ $name }}">
    <label class="form-check-label" for="{{ $name }}">{{ $label}}</label>
    <input type="checkbox" @checked(old($name, $value ?? false)) value='1' name="{{ $name }}" class="form-check-input @error($name) is-valid @enderror" role='switch' id="{{ $name }}">
    @error($name)
        <small class="absolute right-3 text-red-500 overflow-x-auto whitespace-nowrap -mt-1.5 max-w-full">{{ $message }}</small>
    @enderror()
</div>