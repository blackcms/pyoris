@if ($sidebar == 'footer_sidebar')
    <div class="col-md-4 col-xs-12">
        <aside class="footer-column text-center">
            @else
                <aside class="widget widget--transparent">
                    @endif
                    <h4>{{ $config['name'] }}</h4>
                    {!!
                        Menu::generateMenu([
                            'slug'    => $config['menu_id'],
                            'options' => ['class' => ('') ]
                        ])
                    !!}
                </aside>
        @if ($sidebar == 'footer_sidebar')
    </div>
@endif
