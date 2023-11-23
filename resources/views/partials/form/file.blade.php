<div class="form-group @error($name) text-danger @enderror">
    @isset($label)<label for="{{ $name }}[]">{{ $label }}@isset($required)<span class="required-label"> *</span>@endisset</label>@endisset
    <div class="custom-file">
        <input type="file" class="form-control @error($name) is-invalid @enderror" id="file_{{ $random ?? null }}" name="{{ $name }}" @include('partials.form.attributes')>

    </div>
    @error($name)
    <div class="text-danger invalid-feedback-custom">{{ $message }}</div>
    @enderror
</div>