<input class="form-control field-type-percentage"
    type="number"
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
    @if($field['decimals'] ?? false)
	   step="{{ 1/pow(10, $field['decimals']) }}"
    @endif
    @if($field['validation']['rule'] ?? false)
       osi-input-rule="{{ $field['validation']['rule'] }}"
    @endif
    @if($field['validation']['min'] ?? false)
       min="{{ $field['validation']['min'] }}"
    @endif
    @if($field['validation']['max'] ?? false)
       max="{{ $field['validation']['max'] }}"
    @endif
    @if($field['validation']['pattern'] ?? false)
       pattern="{{ $field['validation']['pattern'] }}"
    @endif
/>
