<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            {{-- <h2 class="title"> {!! $value['icon'] !!}  {!! $value['title'] !!}</h2> --}}
            <h2 class="title">
                <i class="fas fa-user"></i> Modulo Usuarios
            </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                <input type="checkbox" value="true" name="user_list" @if(kvfj($u->permissions, 'user_list')) checked @endif> 
                <label for="checkbox">Puede ver la lista de Usuarios</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="user_edit" @if(kvfj($u->permissions, 'user_edit')) checked @endif> 
                <label for="checkbox">Puede editar Usuarios</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="user_banned" @if(kvfj($u->permissions, 'user_banned')) checked @endif> 
                <label for="checkbox">Puede banear Usuarios</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="user_permissions" @if(kvfj($u->permissions, 'user_permissions')) checked @endif> 
                <label for="checkbox">Puede administrar Usuarios</label>
            </div>
        </div>
    </div>
</div>