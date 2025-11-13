@extends('layouts.app')

@section('content')
    <h3>Data Rumah Sakit</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('rumahsakit.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Rumah Sakit" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                    </div>
                    <div class="col-md-2">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="telepon" class="form-control" placeholder="Telepon" required>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success w-100">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $rs)
                <tr>
                    <td>{{ $rs->id }}</td>
                    <td>{{ $rs->nama }}</td>
                    <td>{{ $rs->alamat }}</td>
                    <td>{{ $rs->email }}</td>
                    <td>{{ $rs->telepon }}</td>
                    <td>
                        <button class="btn btn-danger btn-delete" data-id="{{ $rs->id }}">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).on('click', '.btn-delete', function() {
            if (confirm('Yakin hapus data ini?')) {
                $.ajax({
                    url: "/rumahsakit/" + $(this).data('id'),
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        });
    </script>
@endsection
