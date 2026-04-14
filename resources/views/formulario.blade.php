<!DOCTYPE html>
<html lang="es">
<head>
 <title>Document</title>
</head>
<body>
 <form action="{{route('archivos.recibir')}}" method="post" enctype="multipart/form-data">
   <label for='nombre'>nombre</label>
   <input type='text' name='nombre' id='nombre'><br>
   <label for='archivo'>archivo</label>
   <input type='file' name='archivo' id='archivo'><br>
   <input type="submit" value="ENVIAR">
   @csrf
  </form>
</body>
</html>