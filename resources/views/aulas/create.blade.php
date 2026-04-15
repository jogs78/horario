@extends('plantillas.plantilla')
@section('titulo')
 CREAR
@endsection

@section('contenido')
UNO NUEVO:
 <form action="{{route('aula.store')}}" method="POST" enctype="multipart/form-data">
  <label for='nombre'>nombre</label>
  <input type='text' name='nombre' id='nombre'><br>
  <label for='capacidad'>capacidad</label>
  <input type='text' name='capacidad' id='capacidad'><br> 
  <label for='foto'>Foto</label>
  <input type='file' name='foto' id='foto'><br>
  <input type="submit" value="GUARDAR">
  @csrf
 </form> 
@endsection