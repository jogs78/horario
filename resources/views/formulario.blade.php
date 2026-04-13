<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
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