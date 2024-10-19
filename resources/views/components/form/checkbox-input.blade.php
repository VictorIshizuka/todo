<div class="inputArea" style="display:flex; align-items: center">
    <label for="{{ $name }}"">{{ $label ?? '' }}</label>
    <input style="width:50px;" type="checkbox" id="{{ $name }}" name="{{ $name }}"
        {{ empty($required) ? '' : 'required' }} value="1" {{ $checked ? 'checked' : '' }} />
</div>
