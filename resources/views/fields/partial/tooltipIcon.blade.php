<label class="{{ $field['labelplaceholder'] === "top" ?
        "col-form-label-top" : "col-lg-{$field['labelplaceholder']} col-form-label" }}"
       for="{{ $field['name'] }}">
    @if (!in_array($field['type'] ?? "", ['checkbox', 'title']))
        <span>{{ $field['displayName'] ?? "" }}</span>
    @endif
    @if (($field['tooltip'] ?? false) && ($field['tooltipIconOnly'] ?? false))
        <i class="fa fa-question-circle cursor-pointer"
           data-toggle="tooltip" data-placement="auto top"
           title="{{ $field['tooltip'] }}"></i>
    @endif
</label>