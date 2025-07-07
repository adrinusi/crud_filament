<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #dc3545;"> <!-- Merah -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow rounded text-center">
                    <div class="card-body">
                        <h3 class="mb-4">Selamat datang, {{ session('user')->name }}</h3>

                        <a href="{{ url('/mahasiswa') }}" class="btn btn-primary w-100 mb-2">Kunjungi Data Mahasiswa</a>
                        <a href="{{ url('/logout') }}" class="btn btn-light w-100">Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
