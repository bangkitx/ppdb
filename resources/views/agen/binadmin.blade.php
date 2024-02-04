@extends('layouts.main')

@section('container')
    {{-- <div class="container">
        <div class="row">
            <div class="col"> --}}
    <div class="card">

        <div class="card-header">

            <h3>Restore Data</h3>
        </div>
        <div class="card-body">
            <form method="GET" class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="cari" id="cari"
                        placeholder="Cari admin..." value={{ request()->get('cari') }}>
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
                        @foreach ($agen->where('role', 2) as $key => $item)
                            <tr>
                                <td>{{ ++$counter }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form method="POST" action="{{ route('agen.restore', $item->id) }}"
                                        accept-charset="UTF-8"
                                        style="display:inline-block;
                                                    margin: 5px;">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-warning btn-sm" title="Restore Admin"
                                            onclick="return confirm(&quot;Apakah anda ingin memulihkan data admin {{ $item->name }}?&quot;)"><i
                                                class="fa fa-trash-restore" aria-hidden="true"></i></button>
                                    </form>
                                    {{-- <a href="{{ url('/agen/' . $item->id . '/edit') }}" title="Edit Agen"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> --}}
                                    <form method="POST" action="{{ route('agen.forceDelete', $item->id) }}"
                                        accept-charset="UTF-8"
                                        style="display:inline-block;
                                                    margin: 5px;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Admin"
                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data admin {{ $item->name }}?&quot;)"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row mb-5">
                    <div class="col-md-8">
                        Showing {{ $agen->firstItem() }} to {{ $agen->lastItem() }} of {{ $agen->total() }}
                    </div>
                    <div class="col-md-4">
                        {{ $agen->links() }}
                    </div>
                </div>

            </div>
            {{-- </div>
                </div>
            </div> --}}
        </div>
    </div>
    <script></script>
@endsection
