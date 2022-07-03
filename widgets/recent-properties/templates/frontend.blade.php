@if (is_addon_active('seapp'))
    @php
        $properties = get_recent_properties($config['number_display']);
    @endphp
    @if ($properties->count())
        @if ($sidebar == 'footer_sidebar')
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="widget widget--transparent widget__footer">
                    @else
                        <div class="widget widget__recent-post">
                            @endif
                            <div class="widget__header">
                                <h3 class="widget__title">{{ $config['name'] }}</h3>
                            </div>
                            <div class="widget__content">
                                <ul @if ($sidebar == 'footer_sidebar') class="list list--light list--fadeIn" @endif>
                                    @foreach ($properties as $property)
                                        <li>
                                            @if ($sidebar == 'footer_sidebar')
                                                <a href="{{ $property->url }}" data-number-line="2">{{ $property->name }}</a>
                                            @else
                                                <article class="post post__widget">
                                                    <div class="post__thumbnail"><img src="{{ MediaManagement::getImageUrl($property->image, 'thumb', false, MediaManagement::getDefaultImage()) }}" alt="{{ $property->name }}">
                                                        <a href="{{ $property->url }}" class="post__overlay"></a></div>
                                                    <header class="post__header">
                                                        <h5 class="post__title"><a href="{{ $property->url }}" data-number-line="2">{{ $property->name }}</a></h5>
                                                        <div class="post__meta"><span class="post__created-at">{{ $property->created_at->translatedFormat('M d, Y') }}</span></div>
                                                    </header>
                                                </article>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @if ($sidebar == 'footer_sidebar')
                </div>
        @endif
    @endif
@endif
