@php Theme::set('section-name', __('Search result for: ') . ' "' . Request::input('q') . '"') @endphp
@php Theme::layout('no-sidebar') @endphp
<div class="row p-4">
    @if ($locations->count() > 0)
        @foreach ($locations as $object)
            <div class="col-md-3 col-12">
                <div class="card bg-primary mb-4 rounded">
                    <a href="{{ $object->url }}">
                        <img class="card-img-top"  src="{{ MediaManagement::getImageUrl($object->image, 'medium', false, MediaManagement::getDefaultImage()) }}" alt="{{ $object->name }}">
                    </a>
                    <div class="card-body bg-primary text-white">
                        <a href="{{ $object->url }}" class="card-title">{{ $object->name }}</a>
                        <p class="card-text">{{ $object->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Delta (100): {{ $object->delta_100 }}</li>
                        <li class="list-group-item">Delta (150): {{ $object->delta_150 }}</li>
                        <li class="list-group-item">Delta (200): {{ $object->delta_200 }}</li>
                        <li class="list-group-item">Delta (250): {{ $object->delta_250 }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
        <div class="pt-4 page-pagination text-right">
            {!! $locations->withQueryString()->links() !!}
        </div>
    @else
        <div class="alert alert-warning">
            <p>{{ __('There is no data to display!') }}</p>
        </div>
    @endif
</div>
