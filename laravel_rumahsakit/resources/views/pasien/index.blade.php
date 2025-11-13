@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Data Pasien</h3>
        <div class="mb-3">
            <label>Filter Rumah Sakit:</label>
            <select id="filter_rs" class="form-select" style="width:200px;">
                <option value="">Semua</option>
                @foreach ($rumahsakit as $rs)
                    <option value="{{ $rs->id }}" {{ $selected == $rs->id ? 'selected' : '' }}>{{ $rs->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="table_pasien">
            @include('pasien.table')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#filter_rs').on('change', function() {
            $.ajax({
                url: "{{ route('pasien.index') }}",
                data: {
                    filter_rs: $(this).val()
                },
                success: function(data) {
                    $('#table_pasien').html(data);
                }
            });
        });

        $(document).on('click', '.btn-delete', function() {
            if (confirm('Yakin hapus data ini?')) {
                $.ajax({
                    url: "/pasien/" + $(this).data('id'),
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
