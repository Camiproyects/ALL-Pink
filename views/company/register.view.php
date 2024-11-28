<div class="container py-5">
    <div class="row py-5">
        <div class="text-center pt-3">
            <h1 class="h1">Registro de Usuario</h1>
        </div>
        <form class="col-md-9 m-auto" action="?c=Register" method="POST" role="form">
            <!-- Campo oculto para user_code (auto incremental) -->
            <input type="hidden" id="user_code" name="user_code">

            <!-- Campo oculto para rol_code (valor fijo 1: Cliente) -->
            <input type="hidden" id="rol_code" name="rol_code" value="1">

            <div class="mb-3">
                <label for="user_name">Nombre</label>
                <input type="text" class="form-control mt-1" id="user_name" name="user_name" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <label for="user_lastname">Apellido</label>
                <input type="text" class="form-control mt-1" id="user_lastname" name="user_lastname" placeholder="Apellido" required>
            </div>
            <div class="mb-3">
                <label for="user_id">ID</label>
                <input type="text" class="form-control mt-1" id="user_id" name="user_id" placeholder="Identificación" required>
            </div>
            <div class="mb-3">
                <label for="user_email">Correo Electrónico</label>
                <input type="email" class="form-control mt-1" id="user_email" name="user_email" placeholder="Correo Electrónico" required>
            </div>
            <div class="mb-3">
                <label for="user_pass">Contraseña</label>
                <input type="password" class="form-control mt-1" id="user_pass" name="user_pass" placeholder="Contraseña" required>
            </div>
            <div class="mb-3">
                <label for="user_phone">Teléfono</label>
                <input type="text" class="form-control mt-1" id="user_phone" name="user_phone" placeholder="Teléfono" required>
            </div>

            <!-- Campo oculto para user_state (valor fijo 1: Activo) -->
            <input type="hidden" id="user_state" name="user_state" value="1">

            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success btn-lg px-3">Registrar</button>
            </div>
        </form>
    </div>
</div>
