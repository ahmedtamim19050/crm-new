<div class="form-group @error($name) text-danger @enderror">
    @isset($label)<label for="{{ $name }}[]">{{ $label }}@isset($required)<span class="required-label"> *</span>@endisset</label>@endisset
    @isset($prepend)
    <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend">{!! $prepend !!}</span>
    </div>
    @endisset

        <select id="" name="{{ $name }}" class="dynamic-option-creation @error($name) is-invalid @enderror">
            @foreach($options as $optionKey => $optionName)
        
                <option value="{{ $optionKey }}" >{{ $optionName }}</option>
            @endforeach 
         
        </select>
    @isset($prepend)
    </div>
    @endisset
    @error($name)
    <div class="text-danger invalid-feedback-custom">{{ $message }}</div>
    @enderror
</div>        