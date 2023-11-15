@extends('layouts.main')

@section('container')
    {{-- <div class="container">
        <div class="row">
            <div class="col"> --}}
                <div class="card">
                    
                    <div class="card-header">

                        <h3>Daftar Siswa</h3>
                    </div>
                    <div class="card-body">
                        {{-- <a href="{{ url('/agen/create') }}" class="btn btn-success btn-sm float-left" title="Add New Agen">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Siswa
                        </a> --}}
                        <form method="GET" action="{{ url('/agen') }}" class="form-inline my-2 my-lg-0">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="cari"
                                    placeholder="Cari siswa..." value="{{ request()->get('cari') }}">
                                <input type="text" class="form-control bg-light border-0 small" name="tahun"
                                    placeholder="Tahun" value="{{ request()->get('tahun') }}">
                                {{-- Filter Gelombang dengan Dropdown Select --}}
                                <select class="form-control bg-light border-0 small" name="gelombang">
                                    <option value="">Pilih Gelombang...</option>
                                    <option
                                        value="Gelombang 1"{{ request()->get('gelombang') == 'Gelombang 1' ? ' selected' : '' }}>
                                        Gelombang 1</option>
                                    <option
                                        value="Gelombang 2"{{ request()->get('gelombang') == 'Gelombang 2' ? ' selected' : '' }}>
                                        Gelombang 2</option>
                                </select>

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
                                        <th>Gelombang Pendaftaran</th>
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
                                            <td>{{ $item->gelombang }}</td>
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
                                                @if (empty($item->datapokok))
                                                    <form method="POST" action="{{ url('/agen' . '/' . $item->id) }}"
                                                        accept-charset="UTF-8" style="display:inline-block;
                                                        margin: 3px;">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Siswa"
                                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa {{ $item->name }}?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                @elseif (is_null($item->datapokok))
                                                    <form method="POST" action="{{ url('/agen' . '/' . $item->id) }}"
                                                        accept-charset="UTF-8" style="display:inline-block;
                                                        margin: 3px;">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Siswa"
                                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa {{ $item->name }}?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                @elseif ($item->role == 0)
                                                    Admin Account

                                                    {{-- @elseif ($item->) --}}
                                                @else
                                                    <a href="{{ url('/agen/nilai/' . $item->id) }}"
                                                        title="Tambah Kelulusan Siswa"><button
                                                            class="btn btn-success btn-sm "style="display:inline-block;
                                                            margin: 3px;"><i class="fa fa-plus-square"
                                                                aria-hidden="true"></i></button></a>
                                                        
                                                    <a target="_blank" href="{{ url('/agen/cetak-kartu/'.$item->id) }}"
                                                        title="Cetak Kartu Ujian">
                                                        <button class="btn btn-warning btn-sm" style="display:inline-block;
                                                        margin: 3px;"><i class="fa fa-print"
                                                                aria-hidden="true"></i></button>
                                                    </a>
                                                    <a href="{{ url('/agen/' . $item->id) }}" title="Lihat Siswa"><button
                                                            class="btn btn-info btn-sm"style="display:inline-block;
                                                            margin: 3px;"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></button></a>
                                                    <a href="{{ url('/agen/' . $item->id . '/edit') }}"
                                                        title="Edit Data Pendaftar"><button class="btn btn-primary btn-sm"style="display:inline-block;
                                                        margin: 3px;"><i
                                                                class="fa fa-pen" aria-hidden="true"></i>
                                                        </button></a>
                                                    <form method="POST" action="{{ url('/agen' . '/' . $item->id) }}"
                                                        accept-charset="UTF-8" style="display:inline-block;
                                                        margin: 3px;">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Siswa"
                                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa {{ $item->name }}?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                @endif
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
                            <div class="row">
                                <a href="/excel/sudah-bayar?tahun={{ request()->get('tahun') }}&gelombang={{ request()->get('gelombang') }}"
                                    class="btn btn-success btn-block">Daftar siswa Sudah bayar
                                    (Download XLSX)</a>
                                <a href="/excel/sudah-lulus?tahun={{ request()->get('tahun') }}&gelombang={{ request()->get('gelombang') }}"
                                    class="btn btn-success btn-block">Daftar siswa Sudah lulus
                                    (Download XLSX)</a>
                                <a href="/excel/tidak-lulus?tahun={{ request()->get('tahun') }}&gelombang={{ request()->get('gelombang') }}"
                                    class="btn btn-success btn-block">Daftar siswa Tidak lulus
                                    (Download XLSX)</a>
                        
                            </div>
                        </div>
                    </div>
                {{-- </div>
            </div>
        </div> --}}
    </div>
    <script></script>
@endsection
