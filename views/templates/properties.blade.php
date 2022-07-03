@if ($properties->count() > 0)
    @foreach ($properties as $property)
        <article class="post post__horizontal mb-40">
            <div class="post__thumbnail">
                <img src="{{ MediaManagement::getImageUrl($property->image, 'medium', false, MediaManagement::getDefaultImage()) }}" alt="{{ $property->name }}"><a href="{{ $property->url }}" class="post__overlay"></a>
            </div>
            <div class="post__content-wrap">
                <header class="post__header">
                    <h3 class="post__title"><a href="{{ $property->url }}">{{ $property->name }}</a></h3>
                    <div class="post__meta"><span class="post__created-at"><i class="ion-clock"></i>{{ $property->created_at->translatedFormat('M d, Y') }}</span>
                        @if ($property->author->username)
                            <span class="post__author"><i class="ion-android-person"></i><span>{{ $property->author->name }}</span></span>
                        @endif
                        <span class="post-category"><i class="ion-cube"></i>
                            @foreach($property->locations as $location)
                                <a href="{{ $location->url }}">{{ $location->name }}</a>@if (!$loop->last),@endif
                            @endforeach
                        </span></div>
                </header>
                <div class="post__content" style="padding: 0">
                    <p data-number-line="4">{{ $property->description }}</p>
                </div>
            </div>
        </article>
    @endforeach
    <div class="page-pagination text-right">
        {!! $properties->withQueryString()->links() !!}
    </div>
@endif

<style>
    .section.pt-50.pb-100 {
        background-color: #ecf0f1;
    }
</style>
