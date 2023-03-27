@if($usuario->roles->isNotEmpty())
    @foreach($usuario->roles as $rol)
        <span class="badge badge-secondary">{{$rol->nombre}}</span>
    @endforeach
@endif
