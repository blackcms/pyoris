{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
    <section class="section page-intro pt-50 pb-50">
        <div class="container">
            <h3 class="page-intro__title">{{ Theme::get('section-name') }}</h3>
            {!! Theme::breadcrumb()->render() !!}
        </div>
    </section>
@endif

<section class="section">
    <div class="p-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="page-content">
                    {!! Theme::content() !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-sidebar">
                    {!! Theme::partial('sidebar') !!}
                </div>
            </div>
        </div>
    </div>
</section>
{!! Theme::partial('footer') !!}
