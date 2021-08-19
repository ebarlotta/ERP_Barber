<div role="dialog" aria-modal="true" aria-labelledby="modal-headline">
<div style="width: 100%;background-color: bisque;border-radius: 20px;height: 5rem;justify-content: center;display: flex; margin: 4px;
align-items: center; text-align: center; padding-top:1px; font-size: 2rem;">
    {{ $empresa->name }}
</div>

<div style="display: flex; flex-wrap: wrap; justify-content: center;">
    @foreach ($users as $user)
        <div style="width: max-content;background-color: bisque;border-radius: 20px;height: 5rem;justify-content: center;display: block; margin: 4px;
    align-items: center; text-align: center; padding-top:1px; padding-left:2rem; padding-right:2rem;">
            <div style="position: inherit; justify-content: end; display: flex; margin-right: -21px; margin-top: 5px;" 
            placeholder="Agregar" onclick="{{ route('anadirUsuarioEmpresa',['empresa_id'=>$empresa->id, 'user_id'=>$user->id])}}">
                <img src="{{ asset('images/activo.jpg') }}" width="20" height="20">
            </div>
            <p style="margin-top: -10px;">{{ $user->name }}</p>
            <p style="margin-top: -14px;">{{ $user->email }}</p>
        </div>
    @endforeach
</div>
<div style="display: flex; flex-wrap: wrap; justify-content: center;">
    @foreach ($usuarios as $usuario)

        <div style="width: max-content; background-color: rgb(160, 233, 100);border-radius: 20px;height: 5rem;justify-content: center;display: block; margin: 4px; align-items: center; text-align: center; padding-top:1px; padding-left:2rem; padding-right:2rem;">
            <div style="position: inherit; justify-content: end; display: flex; margin-right: -21px; margin-top: 5px;" placeholder="Eliminar">
                <img src="{{ asset('images/pasivo.jpg') }}" width="20" height="20" >
            </div>
            <b>{{ $usuario->name }}</b>
        </div>

    @endforeach
</div>
</div>