<input class="form-control field-type-calculated"
       type="text"
       id="{{ $field['name'] }}"
       name="{{ $field['name'] }}"
       title="{{ $field['tooltip'] ?? "" }}"

       @if($field['validation']['rule'] ?? false)
              osi-input-rule="{{ $field['validation']['rule'] }}"
       @endif
       @if($field['decimals'] ?? false)
              data-decimals="{{ $field['decimals'] }}"
       @endif
       @if($field['decimals'] ?? false)
         data-expression="{{ $field['validation']['exp'] ?? "" }}"
       @endif
       @if($field['tabIndex'] ?? false)
              tabindex="{{ $field['tabIndex'] }}"
       @endif
       @if($field['placeholder'] ?? false)
              placeholder="{{ $field['placeholder'] }}"
       @endif
       @if($field['validation']['min'] ?? false)
              min="{{ $field['validation']['min'] }}"
       @endif
       @if($field['validation']['max'] ?? false)
              max="{{ $field['validation']['max'] }}"
       @endif
       @if($field['required'] ?? false)
              required="required"
       @endif
       @if($field['disabled'] ?? false)
              disabled="disabled"
       @endif
/>
