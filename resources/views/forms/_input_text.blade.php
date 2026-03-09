<div class="{{ $class ?? '' }}">
    <input
      type="{{ $type ?? 'text' }}"
      class="form-control {{ $margin ?? 'mb-3' }}"
      name="{{ $name }}"
      placeholder="{{ $placeholder }}"
      value="{{ $value ?? '' }}"
    >

    <br>

    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>