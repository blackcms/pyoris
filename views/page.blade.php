@if (!BaseHelper::isHomepage($page->id))
    @php
        Theme::set('section-name', Seo::getTitle());
        $page->loadMissing('metadata');

        $bannerImage = $page->getMetaData('banner_image', true);

        if ($bannerImage) {
            Theme::set('breadcrumbBannerImage', MediaManagement::getImageUrl($bannerImage));
        }

    @endphp
    <article class="post post--single">
        <div class="post__content">
            @if (defined('GALLERY_MODULE_NAME') && !empty($galleries = gallery_meta_data($page)))
                {!! render_object_gallery($galleries) !!}
            @endif
            {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content), $page) !!}
        </div>
    </article>
@else
    @if (defined('GALLERY_MODULE_NAME') && !empty($galleries = gallery_meta_data($page)))
        {!! render_object_gallery($galleries) !!}
    @endif
    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content), $page) !!}
@endif
