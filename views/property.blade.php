@php
    Theme::set('section-name', $property->name);
    $property->loadMissing('metadata');

    $bannerImage = $property->getMetaData('banner_image', true);

    if ($bannerImage) {
        Theme::set('breadcrumbBannerImage', MediaManagement::getImageUrl($bannerImage));
    }
@endphp

<article class="post post--single">
    <header class="post__header">
        <h3 class="post__title">{{ $property->name }}</h3>
        <div class="post__meta">
            @if (!$property->locations->isEmpty())
                <span class="post-location"><i class="ion-cube"></i>
                    <a href="{{ $property->firstLocation->url }}">{{ $property->firstLocation->name }}</a>
                </span>
            @endif
            <span class="post__created-at"><i class="ion-clock"></i>{{ $property->created_at->translatedFormat('M d, Y') }}</span>
            @if ($property->author->username)
                <span class="post__author"><i class="ion-android-person"></i><span>{{ $property->author->name }}</span></span>
            @endif

            @if (!$property->taxonomies->isEmpty())
                @php
                    if (is_addon_active('language-advanced')) {
                        $property->taxonomies->loadMissing('translations');
                    }
                @endphp
                <span class="post__tags"><i class="ion-pricetags"></i>
                    @foreach ($property->taxonomies as $taxonomy)
                        <a href="{{ $taxonomy->url }}">{{ $taxonomy->name }}</a>
                    @endforeach
                </span>
            @endif
        </div>
    </header>
    <div class="post__content">
        @if (defined('GALLERY_MODULE_NAME') && !empty($galleries = gallery_meta_data($property)))
            {!! render_object_gallery($galleries, ($property->first_location ? $property->first_location->name : __('Uncategorized'))) !!}
        @endif
        {!! clean($property->content) !!}
        <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
    </div>
    @php $relatedProperties = get_related_properties($property->id, 2); @endphp

    @if ($relatedProperties->count())
        <footer class="post__footer">
            <div class="row">
                @foreach ($relatedProperties as $relatedItem)
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="post__relate-group @if ($loop->last) post__relate-group--right @endif">
                            <h4 class="relate__title">@if ($loop->first) {{ __('Previous Property') }} @else {{ __('Next Property') }} @endif</h4>
                            <article class="post post--related">
                                <div class="post__thumbnail"><a href="{{ $relatedItem->url }}" class="post__overlay"></a>
                                    <img src="{{ MediaManagement::getImageUrl($relatedItem->image, 'thumb', false, MediaManagement::getDefaultImage()) }}" alt="{{ $relatedItem->name }}">
                                </div>
                                <header class="post__header">
                                    <p><a href="{{ $relatedItem->url }}" class="post__title"> {{ $relatedItem->name }}</a></p>
                                    <div class="post__meta"><span class="post__created-at">{{ $property->created_at->translatedFormat('M d, Y') }}</span></div>
                                </header>
                            </article>
                        </div>
                    </div>
                @endforeach
            </div>
        </footer>
    @endif
    <br>
    {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' ? Theme::partial('comments') : null) !!}
</article>
