<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>VideoPost</title>
        <link href="{!!URL::to('bower_components/metro/build/css/metro.css')!!}" rel="stylesheet">
        <link href="{!!URL::to('bower_components/metro/build/css/metro-icons.css')!!}" rel="stylesheet">
        <link href="{!!URL::to('bower_components/metro/build/css/metro-responsive.css')!!}" rel="stylesheet">
        <link href="{!!URL::to('bower_components/metro/build/css/metro-schemes.css')!!}" rel="stylesheet">

        <script src="{!!URL::to('bower_components/jquery/dist/jquery.js')!!}"></script>
        <script src="{!!URL::to('bower_components/metro/build/js/metro.js')!!}"></script>

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        @yield('css')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <nav>
            <div class="app-bar fixed-top navy" data-role="appbar">
                <a class="app-bar-element branding" href="{!!URL::to('/')!!}">VideoPost</a>

                @if(Auth::check())
                <div class="app-bar-element place-right active-container">
                    <span class="dropdown-toggle"><span class="mif-cog"></span>
                        {!!Auth::user()->username!!}
                    </span>
                    <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-white" data-role="dropdown" data-no-close="true" style="width: 220px; display: none;">

                        <ul class="unstyled-list">
                            <li>   
                                <a href="{!!route('logout')!!}"  class="white">  Salir</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                <div class="app-bar-pullbutton automatic" style="display: none;"></div><div class="clearfix" style="width: 0;"></div><nav class="app-bar-pullmenu hidden flexstyle-app-bar-menu" style="display: none;"><ul class="app-bar-pullmenubar hidden app-bar-menu"></ul></nav></div>
        </nav>

        @yield('ruta')
        <div class="panel panel-default">
            <div class="panel-heading text-uppercase">
                @yield('titulo')
            </div>
            <div class="panel-body">
                @yield('content') 
            </div>
            <div class="panel-footer">
                @yield('footer')
            </div>
        </div>
        @yield('script')

    </body>
</html>
