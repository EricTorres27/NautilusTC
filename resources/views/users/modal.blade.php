<div class="modal fade" id="elimirModal" tabindex="-1" aria-labelledby="elimirModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="elimirModal">Eliminar usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Confirmar la eliminación completa del usuario</p>
        </div>
        <div class="modal-footer">
        <div class="container-fluid">
            <div class="row ">
            <div class="col-6">
                <div class="text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
            <div class="col-6">
                <div class="text-center">
                <a href="{{ url_for('views.eliminar_usuario', id=user.id)}}" type="button" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>