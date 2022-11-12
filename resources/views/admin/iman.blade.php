<form action="{{ route('iman') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="nombre_img">
    <input type="text" name="descripcion">
    <input type="submit" value="enviar">
</form>