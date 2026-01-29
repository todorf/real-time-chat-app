<div>
    <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}">
    <br>
    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>