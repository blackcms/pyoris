{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
    <section data-background="{{ Theme::get('breadcrumbBannerImage') ?: (theme_option('default_breadcrumb_banner_image') ? MediaManagement::getImageUrl(theme_option('default_breadcrumb_banner_image')) : '') }}" class="section page-intro pt-100 pb-100 bg-cover">
        <div style="opacity: 0.7" class="bg-overlay"></div>
        <div class="container">
            <h3 class="page-intro__title">{{ Theme::get('section-name') }}</h3>
            {!! Theme::breadcrumb()->render() !!}
        </div>
    </section>
@endif

<section class="section">
    <div class="p-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    {!! Theme::content() !!}
                </div>
            </div>
        </div>
    </div>
</section>
{!! Theme::partial('footer') !!}


