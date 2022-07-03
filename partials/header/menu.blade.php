<ul class="pyoris-menu" id="PyorisMenu">
    @if (theme_option('logo'))
        <a href="{{ route('public.index') }}" style="background: white;">
            <img src="{{ MediaManagement::getImageUrl(theme_option('logo')) }}" alt="{{ theme_option('site_title') }}" height="20">
        </a>
    @else
        <a class="" href="{{ route('public.index') }}" title="{{ theme_option('site_title') }}">
            {{ theme_option('site_title') }}
        </a>
    @endif
    <a href="/" class="active">Home</a>
    {!!
        Menu::renderMenuLocation('main-menu', [
            'options' => ['class' => 'menu sub-menu--slideLeft'],
            'view'    => 'main-menu',
        ])
    !!}
    <a href="javascript:void(0);" class="icon" onclick="themeOpenToogle()">
        <i class="fa fa-bars"></i>
    </a>
    <a class="c-search-toggler close-search"><i class="fa fa-search"></i></a>
</ul>

@if (is_addon_active('seapp'))
    <div class="super-search hide" data-search-url="{{ route('public.ajax.search') }}">
        <form class="quick-search" action="{{ route('public.search') }}">
            <input type="text" name="q" placeholder="{{ __('Type to search...') }}" class="form-control search-input" autocomplete="off">
            <span class="close-search">&times;</span>
        </form>
        <div class="search-result"></div>
    </div>
@endif

<style>

/* Menu Theme */
.pyoris-menu {
    overflow: hidden;
    background-color: #333;
}

.pyoris-menu a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.pyoris-menu a:hover:not(:first-child) {
    background-color: #ddd;
    color: black;
}

.pyoris-menu a.active {
    background-color: var(--color-1st);
    color: white;
}

.pyoris-menu .icon {
    display: none;
}

@media screen and (max-width: 600px) {
    .pyoris-menu a:not(:first-child) {display: none;}
    .pyoris-menu a.icon {
        float: right;
        display: block;
    }
}

@media screen and (max-width: 600px) {
    .pyoris-menu.responsive {position: relative;}
    .pyoris-menu.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
    }
    .pyoris-menu.responsive a {
        float: none;
        display: block;
        text-align: left;
    }
}
</style>
