@if ($sidebar == 'footer_sidebar')
    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
        <div class="widget widget--transparent widget__footer widget__taxonomies widget__taxonomies--transparent">
            @else
                <div class="widget widget__taxonomies widget--transparent widget__taxonomies--transparent">
                    @endif
                    <div class="widget__header">
                        <h3 class="widget__title">{{ $config['name'] }}</h3>
                    </div>
                    <div class="widget__content">
                        <p>
                            @foreach (get_popular_taxonomies($config['number_display']) as $taxonomy)
                                <a href="{{ $taxonomy->url }}" class="taxonomy-link">{{ $taxonomy->name }}</a>
                            @endforeach
                        </p>
                    </div>
                </div>
                @if ($sidebar == 'footer_sidebar')
        </div>
@endif
