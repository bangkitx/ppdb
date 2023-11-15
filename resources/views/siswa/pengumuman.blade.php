@extends('layouts.main')

@section('container')
    <h4 class="mb-3">Hasil Pengumuman {{ $siswa->nama_lengkap }}</h4>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container mb-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Jenis Tes</th>
                    <th>Hasil Nilai</th>
                    {{-- <th>Tanggal Berakhir</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Akademik</td>
                    <td> {{ $siswa->nilai->akademik }}</td>
                    {{-- <td></td> --}}
                </tr>
                <tr>
                    <td>Tes Baca Al-Qur'an</td>
                    <td>{{ $siswa->nilai->test_membaca_al_quran }}</td>
                    {{-- <td></td> --}}
                </tr>
                {{-- <tr>
                    <td>Tes Wawancara</td>
                    <td>{{$config->test_wawancara_start}}</td>
                    <td>{{$config->test_wawancara_due}}</td>
                </tr> --}}
                <tr>
                    <td>Hasil tes</td>
                    <td>{{ $siswa->nilai->status }}</td>
                    {{-- <td></td> --}}

                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    @if ($user->datapokok->nilai->status == 'Tidak Lulus')
        <span href="#" class="d-block text-center mb-3 font-bold rounded py-2 text-lg "
            disabled>Jangan putus asa dan tetep semangat!</span>
    @elseif (is_null(Auth::user()->registrasi_ulang))
        @if ($user->datapokok->nilai->status != 'BELUM LULUS')
            <a href="{{ url('/siswa/registrasi/' . $siswa->id) }}" class="btn btn-primary btn-block">Registrasi Ulang</a>
        @endif
        <hr>
        <a target="_blank" a href="{{ url('/siswa/cetak/' . $siswa->id) }}" title="Cetak Riwayat Siswa" class="btn btn-success btn-block">Cetak Surat Pernyataan (PDF)</a>
    @else
        <button onclick="alert('Kamu sudah melakukan registrasi ulang!')" class="btn btn-primary btn-block mb-3"
            disabled>Registrasi Ulang</button>
        <div class="alert alert-success mb-3">
            Kamu sudah melakukan registrasi ulang!
        </div>
        <hr>
        <a target="_blank" a href="{{ url('/siswa/cetak/' . $siswa->id) }}" title="Cetak Riwayat Siswa"
            class="btn btn-success btn-block">Cetak Surat Pernyataan (PDF)</a>
    @endif
    {{-- <a href="/" class="btn btn-warning btn-block">Cetak Datapokok</a> --}}
    <a target="_blank" a href="{{ url('/siswa/cetakpokok/' . $siswa->id) }}" title="Cetak Datapokok Siswa"
        class="btn btn-success btn-block">Cetak Riwayat (PDF)</a>
    <hr>
    <a href="/siswa" class="btn btn-warning btn-block">Kembali</a>

   
@endsection
