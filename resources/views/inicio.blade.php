@extends('app')
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>

<script src="{!! asset('bower_components/angular/angular.js')!!}"></script>
<script src="{!! asset('js/controladores/postVideo.js')!!}"></script>
<script src="{!! asset('js/app.js')!!}"></script>
@section('titulo')
Publicaciones
@endsection
@section('content')
<div ng-app="VideoPost">

    <form class="form" ng-controller="InicioController" ng-submit="uploadFile()" style="width: 800px;margin: auto"> 

        <div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true" data-text-max-height="200">
            <label class="">Titulo:</label><br><br>
            <input class="form-control" required="" ng-model="titulo"></textarea>
            <label class="">Descripción:</label><br><br>
            <textarea class="form-control" required="" ng-model="descripcion"></textarea>
            <div class="input-control file" data-role="input">
                <input type="file" placeholder="Seleccione un video" uploader-model="file" required="">
            </div>
            <button class="btn btn-primary btn-sm">Publicar</button>
        </div>
    </form>
    <hr>

    <ul class="timeline" style="width: 800px;margin: auto">
        <li>
            <div class="timeline-badge"><i class="fa fa-check"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                    </p>
                </div>
                <div class="timeline-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.
                    </p>
                    <iframe style="width: 100%" src="https://www.youtube.com/embed/QNu5zwqUi98?controls=0&amp;showinfo=0" frameborder="0" allowfullscreen="" class="DRAGDIS_VIDEO DRAGDIS_iframe"></iframe>
                </div>
            </div>
        </li>

        <li class="timeline-inverted">
            <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                </div>
                <div class="timeline-body">
                    <iframe style="width: 100%" src="https://www.youtube.com/embed/QNu5zwqUi98?controls=0&amp;showinfo=0" frameborder="0" allowfullscreen="" class="DRAGDIS_VIDEO DRAGDIS_iframe"></iframe>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
                </div>
            </div>
        </li>
    </ul>
</div>

@endsection