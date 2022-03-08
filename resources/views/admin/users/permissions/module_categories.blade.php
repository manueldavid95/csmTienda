<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            {{-- <h2 class="title"> {!! $value['icon'] !!}  {!! $value['title'] !!}</h2> --}}
            <h2 class="title">
                <i class="far fa-folder-open"></i> Modulo Categorias
            </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                <input type="checkbox" value="true" name="categories" @if(kvfj($u->permissions, 'categories')) checked @endif> 
                <label for="checkbox">Puede ver la lista de Categorias.</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="category_add" @if(kvfj($u->permissions, 'category_add')) checked @endif> 
                <label for="checkbox">Puede crear nuevas Categorias.</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="category_edit" @if(kvfj($u->permissions, 'category_edit')) checked @endif> 
                <label for="checkbox">Puede editar Categorias.</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="category_delete" @if(kvfj($u->permissions, 'category_delete')) checked @endif> 
                <label for="checkbox">Puede eliminar Categorias.</label>
            </div>
        </div>
    </div>
</div>