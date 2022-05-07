@php
    $id ??= uniqid('input');
@endphp
<div class="form-group mt-3">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value ?? '' }}" class="form-control">
</div>
