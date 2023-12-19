<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administrador de cuotas')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('alumnos.index') }}">Gestión de pagos mensuales</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a>
                </li>
                <!-- Agrega más enlaces de navegación según sea necesario -->
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás segura?',
                text: 'No podrás revertir esto',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar patinador',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si se confirma, enviar el formulario de eliminación
                    document.getElementById('form-eliminar-' + id).submit();
                }
            });
        }
        function confirmarEdicion(id) {
            Swal.fire({
                title: 'Confirmar edición',
                text: '¿Desea confirmar la edción?',
                icon: 'succes',
                showCancelButton: true,
                confirmButtonColor: '#green',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, editar patinador',
                cancelButtonText: 'Cancelar',
                timer: 6000,
                
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si se confirma, enviar el formulario de eliminación
                    document.getElementById('form-editar-' + id).submit();
                }
            });
        }
</script>
</body>
</html>
