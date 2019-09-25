<select class="form-control"
        name="{{ $field['name'] }}"
        id="{{ $field['name'] }}"
        title="{{ $field['tooltip'] ?? $field['displayName'] ?? "" }}"
        @if($field['validation']['rule'] ?? false)
        osi-input-rule="{{ $field['validation']['rule'] }}"
        @endif
        @if($field['required'] ?? false)
        required="required"
        @endif
        @if($field['tabIndex'] ?? 0)
        tabindex="{{ $field['tabIndex'] }}"
        @endif
>
    @foreach(($field['options'] ?? []) as $index => $option)
    <option
            value="{{ $option['value'] }}"
            @if(isset($field['value']) && $field['value'] == $option['value'])
                selected="selected"
            @endif
    >{!! $option['text'] ?? $option['value'] ?? "" !!}</option>
    @endforeach
</select>