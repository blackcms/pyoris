<!-- footer -->
<div class="pyoris-footer">
    <div class="p-4">
        <div class="row">
            {!! dynamic_sidebar('footer_sidebar') !!}
            <div class="col-12">
                <div class="footer-column text-center pt-3" style="border-top: 1px solid var(--color-1st);">
                    {{-- <li class="mb-2">
                        @if (theme_option('social_links'))
                            @foreach(json_decode(theme_option('social_links'), true) as $socialLink)
                                @if (count($socialLink) == 3)
                                    <a class="text-white h3" href="{{ $socialLink[2]['value'] }}" title="{{ $socialLink[0]['value'] }}">
                                        <i class="{{ $socialLink[1]['value'] }}"></i>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    </li> --}}
                    <li>
                        @if (theme_option('copyright'))
                            {{-- @if (theme_option('site_description'))
                                {!! theme_option('site_description') !!}
                            <br>
                            @endif --}}
                            {!! theme_option('copyright') !!}
                            <br><br>
                            Powered by BlackCMS {!! get_cms_version() !!}
                        @else
                            Copyright &copy; 2022 | BlackCMS
                            <br>All Right Reserved
                        @endif
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="back2top">
    <i class="fa fa-angle-up"></i>
</div>
<!-- JS -->
<script>
/* Theme openMenu */
function themeOpenToogle() {
    var x = document.getElementById("PyorisMenu");

    if (x.className === "pyoris-menu") {
        x.className += " responsive";
    } else {
        x.className = "pyoris-menu";
    }
}
</script>
{!! Theme::footer() !!}
</body>
</html>
