<form action="{{ route('guardarDatos') }}" method="POST">
    @csrf
    <label for="logo">Logo:</label>
    <input type="file" name="logo" accept="image/*">

    <label for="fechainicio">Fecha de Inicio:</label>
    <input type="date" name="fechainicio">

    <label for="fechafin">Fecha de Fin:</label>
    <input type="date" name="fechafin">

    <label for="servicios">Servicios:</label>
    <input type="text" name="servicios">

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion">

    <label for="rubro">Rubro:</label>
    <input type="text" name="rubro">

    <label for="numerocontacto">Número de Contacto:</label>
    <input type="text" name="numerocontacto">

    <label for="id_servicios">ID de Servicios:</label>
    <input type="number" name="id_servicios">

    <button type="submit">Guardar</button>
</form>
