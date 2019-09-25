<input class="form-control field-type-currency"
    type="number"
    id="{{ $field['name'] }}"
    name="{{ $field['name'] }}"
    title="{{ $field['tooltip'] ?? "" }}"
    @if($field['tabIndex'] ?? 0)
       tabindex="{{ $field['tabIndex'] }}"
    @endif
    @if($field['placeholder'] ?? "$")
       placeholder="{{ $field['placeholder'] ?? "$" }}"
    @endif
    @if($field['value'] ?? false)
        value="{{ $field['value'] }}"
    @endif
    @if($field['required'] ?? false)
       required="required"
    @endif
    @if($field['decimals'] ?? 2)
		step="{{ 1/pow(10, $field['decimals'] ?? 2) }}"
    @endif
    @if($field['validation']['rule'] ?? false)
       osi-input-rule="{{ $field['validation']['rule'] }}"
    @endif
    @if($field['validation']['min'] ?? false)
       min="{{ $field['validation']['minlength'] }}"
    @endif
    @if($field['validation']['max'] ?? false)
       max="{{ $field['validation']['max'] }}"
    @endif
/>
