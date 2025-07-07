<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Edit Mahasiswa</h2>

    <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST" class="p-4 border rounded shadow bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" name="nim" id="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <select name="nilai" id="nilai" class="form-select" required>
                <option value="A" {{ $mahasiswa->nilai == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $mahasiswa->nilai == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ $mahasiswa->nilai == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ $mahasiswa->nilai == 'D' ? 'selected' : '' }}>D</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/mahasiswa') }}" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>
