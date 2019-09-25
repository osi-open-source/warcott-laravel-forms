<div class="pb-4 col-lg-{{ $fieldset['size'] ?? 12 }} offset-lg-{{ $fieldset['offset'] ?? 0 }}" id="fieldset-{{ $fieldset['name'] }}">

    <div class="card">
		<div class="card-body">
			@if(!empty($fieldset['tooltip']) || !empty($fieldset['displayName']))
				@if($fieldset['icon'] ?? false)
					<i class="glyphicon glyphicon-{{ $fieldset['icon'] }} float-right"
						rel="tooltip" title="{!! $fieldset['tooltip'] ?? "" !!}"></i>
				@endif
				@if($fieldset['displayName'] ?? false)
					<h2 class="card-title">{!! $fieldset['displayName'] !!}</h2>
				@endif
				@if($fieldset['tooltip'] ?? false)
					<h6 class="card-subtitle mb-2 text-muted">{!! $fieldset['tooltip'] !!}</h6>
				@endif
			@endif

			<div class="row">
				@each('warcott::fields.base', $fieldset['fields'] ?? [], 'field')
			</div>
		</div>
    </div>

</div>
@if ($fieldset['eor'] ?? false)
    <div class="col-lg-12"></div>
@endif
