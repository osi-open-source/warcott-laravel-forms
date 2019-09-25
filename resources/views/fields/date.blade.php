
<div class="form-group">
       <input class="form-control datepicker field-type-date" id='datetimepicker-{{ $field['name'] }}'
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
               @if($field['options'] ?? false)
              options="{{json_encode($field['options'])}}"
              @endif
       />
</div>
<script type="text/javascript">
       $(function () {
              $('#datetimepicker-{{ $field['name'] }}').datetimepicker({format: 'MM/DD/YYYY'}).on('dp.change', function (e) { $(this).change(); });
       });
</script>