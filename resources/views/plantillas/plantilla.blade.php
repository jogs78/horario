<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>@yield('titulo')</title>
</head>
<body>
@guest
  hola debes <a href="{{route('puerta.entrar')}}">entrar</a>
  @php(die())
@else
 hola {{Auth::user()->name}}  puedes <a href="{{route('puerta.salir')}}">salir</a>
@endguest
<hr>
 @yield('contenido')
</body>
</html>