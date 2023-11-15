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
                        {{-- <a href="{{ url('/agen/create') }}" class="btn btn-success btn-sm float-left" title="Add New Agen">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Siswa
                        </a> --}}
                        <form method="GET"
                            class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="cari"
                                    id="cari" placeholder="Cari siswa..." value={{ request()->get('cari') }}>
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
                                        <th>Status Bayar</th>
                                        <th>Status Pendaftaran</th>
                                        <th>Tanggal Dibuat</th>
                                        {{-- <th>Tanggal Diupdate</th> --}}
                                        {{-- <th>Role</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agen as $key => $item)
                                        <tr>
                                            <td>{{ $agen->firstItem() + $key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                @if ($item->payment == '[]')
                                                    Belum 
                                                    {{-- @elseif ($item->payment->status_payment !== 2 && $item->payment->status !== 2)
                                                Proses bayar --}}
                                                @else
                                                    Sudah
                                                @endif
                                                {{-- {{ $item->payment }} --}}
                                            </td>
                                            <td>
                                                @if (empty($item->datapokok))
                                                    Belum 
                                                @elseif (is_null($item->datapokok))
                                                    Belum 
                                                @else
                                                    Sudah
                                                @endif
                                                {{-- {{ $item->datapokok }} --}}
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            {{-- <td>{{ $item->updated_at }}</td> --}}
                                            {{-- <td>{{ $item->role }}</td> --}}
                                            {{-- @if ($item->role == '1')
                                            <td>Admin</td>
                                        @else
                                            <td>Member</td>

                                        @endif --}}
                                            <td>
                                                <form method="POST" action="{{ route('agen.restore', $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline-block;
                                                    margin: 5px;">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-warning btn-sm"
                                                        title="Restore Siswa"
                                                        onclick="return confirm(&quot;Apakah anda ingin memulihkan data siswa {{ $item->name }}?&quot;)"><i
                                                            class="fa fa-trash-restore" aria-hidden="true"></i></button>
                                                </form>
                                                {{-- <a href="{{ url('/agen/' . $item->id . '/edit') }}" title="Edit Agen"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> --}}
                                                <form method="POST" action="{{ route('agen.forceDelete', $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline-block;
                                                    margin: 5px;">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Siswa"
                                                        onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa {{ $item->name }}?&quot;)"><i
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
                                    {{-- {{ $siswa->links() }} --}}
                                    {{ $agen->links() }}
                                </div>
                            </div>
                            {{-- <div class="row">
                                <a href="/excel/sudah-bayar" class="btn btn-success btn-block">Daftar siswa Sudah bayar
                                    (Download XLSX)</a>
                                <a href="/excel/sudah-lulus" class="btn btn-success btn-block">Daftar siswa Sudah lulus
                                    (Download XLSX)</a>
                                <a href="/excel/tidak-lulus" class="btn btn-success btn-block">Daftar siswa Tidak lulus
                                    (Download XLSX)</a>
                            </div> --}}
                        </div>
                    {{-- </div>
                </div>
            </div> --}}
        </div>
    </div>
    <script></script>
@endsection
