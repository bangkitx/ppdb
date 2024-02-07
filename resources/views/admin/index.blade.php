@extends('layouts.main')

@section('container')
    {{-- <div class="container">
        <div class="row">
            <div class="col"> --}}
    <div class="card">

        <div class="card-header">

            <h3>Daftar Admin</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ url('/admin') }}" class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="cari"
                        placeholder="Cari admin..." value="{{ request()->get('cari') }}">

                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br><br>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($admin as $item)
                            <tr>
                                <td>{{ ++$counter }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form method="POST" action="{{ url('/admin' . '/' . $item->id) }}"
                                        accept-charset="UTF-8"
                                        style="display:inline-block;
                                                        margin: 3px;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Admin"
                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data Admin {{ $item->name }}?&quot;)"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row mb-5">
                    <div class="col-md-8">
                        Showing {{ $admin->firstItem() }} to {{ $admin->lastItem() }} of {{ $admin->total() }}
                    </div>
                    <div class="col-md-4">
                        {{ $admin->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#tahun").on("input", function() {
                if (!validateNumber(this)) {
                    this.value = this.value.replace(/[^0-9]/g, "");
                }
            });
        });

        function validateNumber(input) {
            if (input.value.match(/^[0-9]+$/)) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection
