<form id="form-warcott-{{ implode('-', $keys) }}" class="form-warcott" action="{{ $action ?? "" }}" method="{{ $method ?? "POST" }}">
    {{ csrf_field() }}
    <div class="form-fields row">
        @foreach(($dataset['fieldsets'] ?? []) as $fieldset)
            @switch($fieldset['type'] ?? 'fieldset')
                @case('section')
                    @include('warcott::fields/section', ['section' => $fieldset])
                    @break
                @case('fieldset')
                    @include('warcott::fields/fieldset', compact('fieldset'))
            @endswitch
        @endforeach
    </div>
    <input class="btn btn-primary" type="submit" value="{{ $submitText ?? 'Submit' }}">
</form>
