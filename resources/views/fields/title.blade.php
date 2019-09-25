<div class=" {{ $field['class'] ?? "" }} text-{{ $field['labelplaceholder'] ?? "" }}" >{!! $field['displayName'] !!}
    @if (($field['tooltip'] ?? false) && ($field['tooltipIconOnly'] ?? false))
        <i class="fa fa-question-circle cursor-pointer"
           data-toggle="tooltip" data-placement="auto top"
           title="{{ $field['tooltip'] }}"></i>
    @endif</div>