@php

$label ??= null;
$class ??= null;
$name ??= '';
$value ??= null;

@endphp

<div @class(['form-group relative', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach($options as $k => $v)
            <option value="{{ $k }}">{{ ucfirst($v) }}</option>
        @endforeach
    </select>
    @error($name)
        <small class="absolute right-3 text-red-500 overflow-x-auto whitespace-nowrap -mt-1.5 max-w-full">{{ $message }}</small>
    @enderror()
</div>
