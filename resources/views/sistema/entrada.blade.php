<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
 <form action="{{route('puerta.validar')}}" method="post">
  <label for='usuario'>usuario</label>
  <input type='text' name='usuario' id='usuario'><br>
  <label for='clave'>clave</label>
  <input type='text' name='clave' id='clave'><br>
  <input type="submit" value="Enviar">
  @csrf
 </form>
</body>
</html>