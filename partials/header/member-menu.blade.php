<header class="header" id="header">
    <div class="header-wrap clearfix">
        <nav class="nav-top">
            <div class="px-4">
                <div class="pull-left">
                    <div class="language-wrapper">
                        {!! apply_filters('language_switcher') !!}
                    </div>
                </div>
                @if (theme_option('social_links'))
                    <div class="pull-left">
                        <div class="hi-icon-wrap hi-icon-effect-3 hi-icon-effect-3a">
                            @foreach(json_decode(theme_option('social_links'), true) as $socialLink)
                                @if (count($socialLink) == 3)
                                    <a href="{{ $socialLink[2]['value'] }}"
                                    title="{{ $socialLink[0]['value'] }}" class="hi-icon {{ $socialLink[1]['value'] }}" target="_blank">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="pull-right">
                    @if (is_addon_active('member'))
                        <ul class="pull-left">
                            @if (auth('member')->check())
                                <li><a href="{{ route('public.member.dashboard') }}" rel="nofollow">Dashboard</a></li>
                                <li><a href="{{ route('public.member.settings') }}" rel="nofollow"><img src="{{ auth('member')->user()->avatar_url }}" class="img-circle" width="20" alt="{{ auth('member')->user()->name }}"> &nbsp;
                                    <!-- <span>{{ auth('member')->user()->name }}</span> -->
                                </a></li>
                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fa fa-sign-out"></i> {{ __('Logout') }}</a></li>
                            @else
                                <li><a href="{{ route('public.member.login') }}" rel="nofollow"><i class="fa fa-sign-in"></i> {{ __('Login') }}</a></li>
                            @endif
                        </ul>
                        @if (auth('member')->check())
                            <form id="logout-form" action="{{ route('public.member.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
