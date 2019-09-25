<div class="col-lg-{{ $field['size'] ?? 12 }} offset-lg-{{ $field['offset'] ?? 0 }}"
	id="field-{{ $field['name'] }}"
	@if($field['show'] ?? false)
		show-if="{{ $field['show']['field'] }}~{{ $field['show']['op'] ?? "" }}~{{ $field['show']['value'] ?? "" }}"
    @endif
    >
    <div class="form-group form-group-sm row
        @if($field['required'] ?? false) field-is-required
            @unless($field['labelplaceholder'] ?? false) fg-field-required-inline @endunless
        @endif
        @if($field['type'] === "newline") margin-bottom-none @endif">

        @includeWhen(!empty($field['labelplaceholder']) && $field['labelplaceholder'] !== 'top', 'warcott::fields.partial.tooltipIcon')
        <div class="col-lg-{{ !isset($field['labelplaceholder']) || $field['labelplaceholder'] === 'top' ? '12' : (12 - $field['labelplaceholder'])}}">
            @includeWhen(!empty($field['labelplaceholder']) && $field['labelplaceholder'] === 'top', 'warcott::fields.partial.tooltipIcon')

            @includeIf('warcott::fields.'.($field['type'] ?? 'text'))

            @if (($field['tooltip'] ?? false) && !($field['tooltipIconOnly'] ?? false))
                <small class="text-muted form-text"><i class="fa fa-info-circle float-right p-1"></i>{{ $field['tooltip'] }}</small>
            @endif
            @unless($noValidationSummary ?? false)
                <div fg-validation-summary
                     for="{{ $field['name'] }}"
                     fg-validation-messages="@json($field['validation']['messages'] ?? "")"></div>
            @endunless
        </div>
    </div>
</div>
@if ($field['eor'] ?? false)
    <div class="col-lg-12"></div>
@endif
