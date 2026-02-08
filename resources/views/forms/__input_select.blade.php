<div>
    <select name="{{ $name }}">
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ $selected === $key ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>

    <br>
    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
