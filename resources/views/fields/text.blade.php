<input class="form-control"
    type="text"
    id="{{ $field['name'] }}"
    name="{{ $field['name'] }}"
    title="{{ $field['tooltip'] ?? "" }}"
    @if($field['tabIndex'] ?? false)
       tabindex="{{ $field['tabIndex'] }}"
    @endif
    @if($field['placeholder'] ?? false)
       placeholder="{{ $field['placeholder'] }}"
    @endif
    @if($field['value'] ?? false)
        value="{{ $field['value'] }}"
    @endif
    @if($field['required'] ?? false)
       required="required"
    @endif
    @if($field['validation']['rule'] ?? false)
       osi-input-rule="{{ $field['validation']['rule'] }}"
    @endif
    @if($field['validation']['minlength'] ?? false)
       minlength="{{ $field['validation']['minlength'] }}"
    @endif
    @if($field['validation']['maxlength'] ?? false)
       maxlength="{{ $field['validation']['maxlength'] }}"
    @endif
    @if($field['validation']['pattern'] ?? false)
       pattern="{{ $field['validation']['pattern'] }}"
    @endif
/>
