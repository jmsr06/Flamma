@isset($departamentos)
@forelse ($departamentos as $departamento)
@foreach ($departamento->ciudad as $ciudad)
    <tr>
        <td class="selector"><input class="case check" type="checkbox"
            data-ciudad="{{ $ciudad->id }}" name="ciudad[]" value="{{ $ciudad->id }}"></td>
        <td> {{ $ciudad->nombre }}</td>
        <td> {{ $departamento->nombre }}</td>
        <td> {{ $ciudad->costo }}</td>
    </tr>
@endforeach
@empty
<tr>
    <td colspan="4" align="center">No se encontraron resultados</td>
</tr>
@endforelse
@endisset

@isset($ciudades)
@forelse ($ciudades as $ciudad)
    <tr>
        <td class="selector"><input class="case check" type="checkbox"
        data-ciudad="{{ $ciudad->id }}" name="ciudad[]" value="{{ $ciudad->id }}"></td>
        <td> {{ $ciudad->nombre }}</td>
        <td> {{ $ciudad->departamento->nombre }}</td>
        <td> {{ $ciudad->costo }}</td>
    </tr>
@empty
<tr>
    <td colspan="4" align="center">No se encontraron resultados</td>
</tr>
@endforelse
@endisset
