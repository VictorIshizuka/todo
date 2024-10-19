<div class="inputArea">
    <label for="{{ $name }}">{{ $label ?? '' }}</label>
    <select id="{{ $name }}" name="{{ $name }}" {{ empty($required) ? '' : 'required' }}>
        <option selected disabled value=""> {{ $placeholder ?? '' }}</option>
        {{ $slot }}
    </select>
</div>
