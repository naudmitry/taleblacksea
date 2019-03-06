<div class="container">
    <div class="header-inner">
        <div class="branding">
            <h1 class="logo">
                <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::MAIN_PAGE, []) }}"><img src="{{ asset('miracle/images/logo@2x.png') }}" alt="" width="25" height="26">Miracle</a>
            </h1>
        </div>
        <nav id="nav">
            <ul class="header-top-nav">
                <li class="visible-mobile">
                    <a href="#mobile-nav-wrapper" data-toggle="collapse"><i class="fa fa-bars has-circle"></i></a>
                </li>
            </ul>
            <ul id="main-nav" class="hidden-mobile">
                @foreach(array_get($widgets_top, 'middle', []) as $widget)
                    @widget('miracle.' . $widget->class_name, ['widget' => $widget])
                @endforeach
            </ul>
        </nav>
    </div>
</div>