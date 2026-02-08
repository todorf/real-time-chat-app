<div>
    <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}">
    <br>
    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>