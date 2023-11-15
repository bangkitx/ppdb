@extends('layouts.main')

@section('container')
    <h2 class="mb-3">Konfigurasi Tanggal PPDB</h2>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container mb-5">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jenis Aktivitas</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pendaftaran Akun PPDB</td>
                        <td>{{ $config->pendaftaran_akun_ppdb_start }}</td>
                        <td>{{ $config->pendaftaran_akun_ppdb_due }}</td>
                    </tr>
                    <tr>
                        <td>Pendaftaran Sekolah</td>
                        <td>{{ $config->pengumpulan_berkas_start }}</td>
                        <td>{{ $config->pengumpulan_berkas_due }}</td>
                    </tr>
                    <tr>
                        <td>Tes Akademik</td>
                        <td>{{ $config->test_akademik_start }}</td>
                        <td>{{ $config->test_akademik_due }}</td>
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td>{{ $config->test_baca_al_quran_start }}</td>
                        <td>{{ $config->test_baca_al_quran_due }}</td>
                    </tr>
                    {{-- <tr>
                        <td>Tes Wawancara</td>
                        <td>{{$config->test_wawancara_start}}</td>
                        <td>{{$config->test_wawancara_due}}</td>
                    </tr> --}}
                    <tr>
                        <td>Pendaftaran Ulang</td>
                        <td>{{ $config->pendaftaran_ulang_start }}</td>
                        <td>{{ $config->pendaftaran_ulang_due }}</td>
                    </tr>
                    <tr>
                        <td>Gelombang Pendaftaran</td>
                        <td>{{ $config->gelombang }}</td>
                    </tr>
                    <tr>
                        <td>Link WhatsApp</td>
                        <td colspan="2"><a href="{{ $config->redirect_wa }}">{{ $config->redirect_wa }}</a></td>
                        {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                    </tr>
                    {{-- <tr>
                        <td>Pesan Informasi</td>
                        <td colspan="2"><p href="{{ $config->pesan }}">{{ $config->pesan }}</p></td>
                    </tr> --}}
                    <tr>
                        <td>Kelulusan</td>
                        <td colspan="2">
                            @if ($config->pengumuman == 0)
                                Ditutup
                            @else
                                Dibuka
                            @endif
                        </td>
                        {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                    </tr>

                    <tr>
                        <td>Biaya registrasi</td>
                        <td colspan="2">{{ $config->nominal_pembayaran }}</td>
                        {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="3">Midtrans Config</th>
                        {{-- <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th> --}}
                    </tr>
                </thead>
                <tr>
                    <td>Merchant ID</td>
                    <td colspan="2">{{ $config->midtrans_merchant_id }}</td>
                    {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                </tr>
                <tr>
                    <td>Midtrans Client Key</td>
                    <td colspan="2">{{ $config->midtrans_client_key }}</td>
                    {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                </tr>
                <tr>
                    <td>Midtrans Server Key</td>
                    <td colspan="2">{{ $config->midtrans_server_key }}</td>
                    {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                </tr>
                <tr>
                    <td>Midtrans Order ID</td>
                    <td colspan="2">{{ $config->order_id_midtrans }}</td>
                    {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                </tr>
            </table>
        </div>
    </div>
    <a href="/config/edit" class="btn btn-warning btn-block">Update konfigurasi</a>
@endsection
