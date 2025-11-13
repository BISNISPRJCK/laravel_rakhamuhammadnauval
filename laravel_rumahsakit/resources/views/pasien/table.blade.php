<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telpon</th>
            <th>Rumah Sakit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->no_telpon }}</td>
                <td>{{ $p->rumahSakit->nama }}</td>
                <td><button class="btn btn-danger btn-delete" data-id="{{ $p->id }}">Hapus</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
