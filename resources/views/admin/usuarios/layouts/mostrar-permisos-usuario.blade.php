@if($usuario->permisos->isNotEmpty())
    @foreach($usuario->permisos as $permiso)
        <span class="badge badge-secondary">{{$permiso->nombre}}</span>
    @endforeach
@endif
