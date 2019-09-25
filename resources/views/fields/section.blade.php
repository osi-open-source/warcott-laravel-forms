@if ($section['show'] ?? false)

    <div class="col-lg-{{ $section['size'] ?? 12 }} offset-lg-{{ $section['offset'] ?? 0 }}"
         id="section-{{ $section['name'] }}">
        <div class="{{ $section['class'] ?? "h1" }}">{{ $section['title'] ?? "" }}</div>
    </div>
    <div class="col-lg-12"></div>

@endif