@php

$label ??= null;
$type ??= 'text';
$class ??= null;
$name ??= '';
$value ??= null;

@endphp

<div @class(['form-group relative', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    @if($type === 'textarea')
        <textarea type="textarea" id="{{ $name }}" name="{{ $name }}" class="form-control @error($name) outline-red-500 @enderror()">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="form-control @error($name) outline-red-500 @enderror()" value="{{ old($name, $value) }}">
    @endif
    @error($name)
        <small class="absolute right-3 text-red-500 overflow-x-auto whitespace-nowrap -mt-1.5 max-w-full">{{ $message }}</small>
    @enderror()
</div>
