<input
       type="checkbox" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
       class="form-control field-type-checkbox {{ $field['class'] ?? "" }}"
       title="{{ $field['tooltip'] ?? "" }}"
       @if($field['tabIndex'] ?? false)
       tabindex="{{ $field['tabIndex'] }}"
       @endif
       @if($field['required'] ?? false)
       required="required"
       @endif
       id="{{ $field['name'] }}"
       value="{{ $field['valuetrue'] ?? 1 }}"
       @if($field['value'] ?? false)
          checked="checked"
       @endif
       @if($field['validation']['rule'] ?? false)
       osi-input-rule="{{ $field['validation']['rule'] }}"
       @endif
/>
