<!DOCTYPE html>
<html lang="en" ng-app="VideoPost">

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

        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>

        <script src="{!! asset('bower_components/angular/angular.js')!!}"></script>
        <script src="{!! asset('js/controladores/postVideo.js')!!}"></script>
        <script src="{!! asset('js/app.js')!!}"></script>
    </head>
    <body>
        <nav>
            <div class="app-bar fixed-top navy" data-role="appbar">
                <a class="app-bar-element branding" href="{!!URL::to('/inicio')!!}">VideoPost</a>
<!--                <span class="app-bar-divider"></span>
                <ul class="app-bar-menu">
                    <li data-flexorderorigin="0" data-flexorder="1"><a href="">Dashboard</a></li>
                    <li data-flexorderorigin="1" data-flexorder="2">
                        <a href="" class="dropdown-toggle">Project</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="">New project</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="" class="dropdown-toggle">Reopen</a>
                                <ul class="d-menu" data-role="dropdown">
                                    <li><a href="">Project 1</a></li>
                                    <li><a href="">Project 2</a></li>
                                    <li><a href="">Project 3</a></li>
                                    <li class="divider"></li>
                                    <li><a href="">Clear list</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li data-flexorderorigin="2" data-flexorder="3"><a href="">Security</a></li>
                    <li data-flexorderorigin="3" data-flexorder="4"><a href="">System</a></li>
                    <li data-flexorderorigin="4" data-flexorder="5">
                        <a href="" class="dropdown-toggle">Help</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="">ChatOn</a></li>
                            <li><a href="">Community support</a></li>
                            <li class="divider"></li>
                            <li><a href="">About</a></li>
                        </ul>
                    </li>
                </ul>-->

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
        <h2>Publicaciones</h2>
        <div class="example" data-text="Video post">
            <div class="grid">
                <div class="row cells3">
                    <form ng-controller="InicioController" ng-submit="uploadFile()"> 

                        <div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true" data-text-max-height="200">
                            <label>Comentario:</label><br><br>
                            <textarea required="" ng-model="comentario"></textarea>
                            <div class="input-control file" data-role="input">
                                <input type="file" placeholder="Seleccione un video" uploader-model="file" required="">
                                <button class="button"><span class="mif-folder"></span></button>
                            </div>
                            <button class="button primary">Publicar</button>
                        </div>
                    </form>
                </div>
                <br>
                <h2>Videos</h2>
                <hr>
                <div class="row cells3">

                    <div class="cell">
                        <h5>Youtube</h5>
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/QNu5zwqUi98?controls=0&amp;showinfo=0" frameborder="0" allowfullscreen="" class="DRAGDIS_VIDEO DRAGDIS_iframe"></iframe>
                        </div>
                        <div class="cell">
                            <h5>Nombre video</h5>
                            <a href="">
                                <span class="mif-thumbs-up mif-2x"></span>
                            </a>
                            <span style="color:transparent">______________</span>
                            <a href="">
                                <span class="mif-thumbs-down mif-2x"></span>
                            </a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </body>
</html>