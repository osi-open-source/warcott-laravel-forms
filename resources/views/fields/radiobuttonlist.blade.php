<div id="{{ $field['name'] }}">
	@foreach(($field['options'] ?? []) as $index => $option)
    <div class="form-check">
        <label title="{{ $field['tooltip'] ?? "" }}" class="form-check-label">
            <input
                    type="radio"
                    name="{{ $field['name'] }}"
                    value="{{ $option['value'] }}"
                    id="{{ $field['name'] }}_{{$index}}"
                    class="form-check-input"
                    @if($field['validation']['rule'] ?? false)
                        osi-input-rule="{{ $field['validation']['rule'] }}"
                    @endif
                    @if($field['tabIndex'] ?? 0)
                        tabindex="{{ $field['tabIndex'] }}"
                    @endif
                    @if(isset($field['value']) && $field['value'] == $option['value'])
                        checked="checked"
                    @endif
                    @if($field['required'] ?? false)
                        required="required"
					@endif
					/>
            <span>{!! $option['text'] ?? $option['value'] ?? "" !!}</span>
        </label>
    </div>
    @endforeach
</div>