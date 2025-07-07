<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
<nav class="col-md-3 col-lg-2 d-md-block bg-danger sidebar shadow-sm p-3 text-center text-white min-vh-100">

    <!-- Foto Dosen -->
    <img src="{{ asset('images/Itachi.webp') }}" alt="Foto Dosen" class="rounded-circle mb-3" width="100" height="100">

    <h5 class="mb-4">Dashboard Dosen</h5>

    <ul class="nav flex-column text-start">
        <li class="nav-item mb-2">
            <a class="nav-link text-white {{ request()->is('mahasiswa') ? 'active fw-bold' : '' }}" href="{{ route('mahasiswa.index') }}">
                Data Mahasiswa
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ url('/logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="GET" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
            {{-- Alert jika ada pesan sukses --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- START DATA -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <form class="d-flex mb-3" action="{{ route('mahasiswa.index') }}" method="get">
                    <input class="form-control me-1" type="search" name="katakunci"
                           value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">+ Tambah Data</a>
                </div>

                <!-- TABEL DATA -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswa as $index => $mhs)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->nilai }}</td>
                                <td>
                                    <a href="{{ route('mahasiswa.edit', $mhs->nim) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Del</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data mahasiswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>

<script>
    const searchInput = document.querySelector('input[name="katakunci"]');
    searchInput.addEventListener('input', function () {
        if (this.value.trim() === '') {
            window.location = "{{ route('mahasiswa.index') }}";
        }
    });
</script>
</body>
</html>
