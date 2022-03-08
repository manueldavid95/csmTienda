<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            {{-- <h2 class="title"> {!! $value['icon'] !!}  {!! $value['title'] !!}</h2> --}}
            <h2 class="title">
                <i class="fas fa-boxes"></i> Modulo Productos
            </h2>
        </div>

        <div class="inside">
            <div class="form-check">
                <input type="checkbox" value="true" name="products" @if(kvfj($u->permissions, 'products')) checked @endif> 
                <label for="products">Puede ver el listado de productos.</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="product_add" @if(kvfj($u->permissions, 'product_add')) checked @endif> 
                <label for="products">Puede agregar nuevos productos.</label>
            </div>

            
            <div class="form-check">
                <input type="checkbox" value="true" name="product_edit" @if(kvfj($u->permissions, 'product_edit')) checked @endif> 
                <label for="products">Puede editar productos.</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="product_delete" @if(kvfj($u->permissions, 'product_delete')) checked @endif> 
                <label for="products">Puede eliminar productos.</label>
            </div>

            
            <div class="form-check">
                <input type="checkbox" value="true" name="product_search" @if(kvfj($u->permissions, 'product_search')) checked @endif> 
                <label for="products">Puede buscar productos.</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="product_gallery_add" @if(kvfj($u->permissions, 'product_gallery_add')) checked @endif> 
                <label for="products">Puede agregar imagenes a la galeria</label>
            </div>

            <div class="form-check">
                <input type="checkbox" value="true" name="product_gallery_delete" @if(kvfj($u->permissions, 'product_gallery_delete')) checked @endif> 
                <label for="products">Puede eliminar imagenes de la galeria</label>
            </div>
        </div>
    </div>
</div>