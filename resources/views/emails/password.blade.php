El sistema {!! config('info.nombreApp')  !!} te notifica que para cambiar tu contraseña
debes presionar clic en el siguiente enlace: {{ url('password/reset/'.$token) }}