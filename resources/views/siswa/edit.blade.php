@extends('layouts.main')

@section('container')

    <body class="bg-gradient-primary">
        {{-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

            <div class="card mb-5">
                <div class="card-header">
                    <b>Isi Data Pendaftaran</b>
                </div>
            <div class="card-body">
                {{-- <div class="container">
                    <div class="row">
                        <div class="p-5"> --}}
                            <form method="POST" action="{{ route('siswa.update') }}" enctype="multipart/form-data">
                                @csrf
                                <h3>Data Pribadi</h3>
                                <h6 class="mb-3" style="color:red;">*wajib diisi</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nama_lengkap" type="text"
                                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                name="nama_lengkap" value="{{ old('nama_lengkap', $data->nama_lengkap) }}"
                                                required placeholder="Nama Lengkap">
                                            @error('nama_lengkap')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nisn" type="text"
                                                class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                                                value="{{ old('nisn', $data->nisn) }}" required placeholder="NISN">
                                            @error('nisn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Add the jenis_kelamin field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="jenis_kelamin"
                                                class="form-select form-control @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" required>
                                                <option value="laki" selected disabled>Pilih jenis kelamin
                                                </option>
                                                <option value="laki"
                                                    {{ old('jenis_kelamin', $data->jenis_kelamin) == 'laki' ? 'selected' : '' }}>
                                                    Laki-Laki
                                                </option>
                                                <option value="perempuan"
                                                    {{ old('jenis_kelamin', $data->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Add the tempat_lahir field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="tempat_lahir" type="text"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                name="tempat_lahir" value="{{ old('tempat_lahir', $data->tempat_lahir) }}"
                                                required placeholder="Tempat Lahir">
                                            @error('tempat_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="tanggal_lahir" type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                name="tanggal_lahir"
                                                value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" required>
                                            @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="jumlah_hafalan"
                                                class="form-select form-control @error('jumlah_hafalan') is-invalid @enderror"
                                                name="jumlah_hafalan" required>
                                                <option value="0"
                                                    {{ old('jumlah_hafalan', '0') == '0' ? 'selected disabled' : '' }}>
                                                    Pilih Jumlah Hafalan Juz</option>
                                                @for ($i = 1; $i <= 30; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ old('jumlah_hafalan', $data->jumlah_hafalan) == $i ? 'selected' : '' }}>
                                                        {{ $i }} Juz</option>
                                                @endfor
                                            </select>

                                            @error('jumlah_hafalan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            @php
                                                $agamaList = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
                                            @endphp
                                            <select id="agama"
                                                class="form-select form-control @error('agama') is-invalid @enderror"
                                                name="agama" required>
                                                <option value="0"
                                                    {{ old('agama', '0') == '0' ? 'selected disabled' : '' }}>
                                                    Pilih Agama</option>
                                                @foreach ($agamaList as $agama)
                                                    <option value="{{ $agama }}"
                                                        {{ old('agama', $data->agama) == $agama ? 'selected' : '' }}>
                                                        {{ $agama }} </option>
                                                @endforeach
                                            </select>
                                            @error('agama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                    <div class="form-group form-outline">
                                        <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required
                                            placeholder="Alamat Siswa">{{ old('alamat', $data->alamat) }}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="asal_sekolah" type="text"
                                                class="form-control @error('asal_sekolah') is-invalid @enderror"
                                                name="asal_sekolah" value="{{ old('asal_sekolah', $data->asal_sekolah) }}"
                                                required placeholder="Asal Sekolah">
                                            @error('asal_sekolah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                    <div class="form-group form-outline">
                                        <textarea id="alamat_sekolah" class="form-control @error('alamat_sekolah') is-invalid @enderror"
                                            name="alamat_sekolah" required placeholder="Alamat Sekolah">{{ old('alamat_sekolah', $data->alamat_sekolah) }}</textarea>
                                        @error('alamat_sekolah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                </div>



                                <h3>Informasi Keluarga</h3>
                                <h6 class="mb-3" style="color:red;">*wajib diisi</h6>
                                <!-- Add the nama_ayah field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline mb-3">
                                            <input id="nama_ayah" type="text"
                                                class="form-control @error('nama_ayah') is-invalid @enderror"
                                                name="nama_ayah" value="{{ old('nama_ayah', $data->nama_ayah) }}"
                                                placeholder="Nama Ayah">
                                            @error('nama_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="no_wa_ayah" type="text"
                                                class="form-control @error('no_wa_ayah') is-invalid @enderror"
                                                name="no_wa_ayah" value="{{ old('no_wa_ayah', $data->no_wa_ayah) }}"
                                                placeholder="No. WhatsApp Ayah">
                                            @error('no_wa_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Add the pekerjaan_ayah field -->


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="pendidikan_terakir_ayah"
                                                class="form-select form-control @error('pendidikan_terakir_ayah') is-invalid @enderror"
                                                name="pendidikan_terakir_ayah">
                                                <option value="" disabled selected>Pilih Pendidikan Terakhir
                                                    Ayah
                                                </option>
                                                <option value="sd"
                                                    {{ old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 'sd' ? 'selected' : '' }}>
                                                    SD
                                                </option>
                                                <option value="smp"
                                                    {{ old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 'smp' ? 'selected' : '' }}>
                                                    SMP
                                                </option>
                                                <option value="sma"
                                                    {{ old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 'sma' ? 'selected' : '' }}>
                                                    SMA
                                                </option>
                                                <option value="d1/2/3"
                                                    {{ old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 'd1/2/3' ? 'selected' : '' }}>
                                                    D1/D2/D3
                                                </option>
                                                <option value="s1"
                                                    {{ old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 's1' ? 'selected' : '' }}>
                                                    S1
                                                </option>
                                                <option value="s2"
                                                    {{ old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 's2' ? 'selected' : '' }}>
                                                    S2
                                                </option>
                                                <option value="s3"
                                                    {{ old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 's3' ? 'selected' : '' }}>
                                                    S3
                                                </option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('pendidikan_terakir_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="pekerjaan_ayah" type="text"
                                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                name="pekerjaan_ayah"
                                                value="{{ old('pekerjaan_ayah', $data->pekerjaan_ayah) }}"
                                                placeholder="Pekerjaan Ayah">
                                            @error('pekerjaan_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Add the penghasilan_ayah field -->
                                        <div class="form-group form-outline">
                                            <select id="penghasilan_ayah"
                                                class="form-select form-control @error('penghasilan_ayah') is-invalid @enderror"
                                                name="penghasilan_ayah">
                                                <option value="1" disabled selected>Pilih Kategori Penghasilan
                                                    Ayah
                                                </option>
                                                <option value="1"
                                                    {{ old('penghasilan_ayah', $data->penghasilan_ayah) == '<1Juta' ? 'selected' : '' }}>
                                                    Di bawah
                                                    Rp
                                                    1.000.000</option>
                                                <option value="2"
                                                    {{ old('penghasilan_ayah', $data->penghasilan_ayah) == '1Juta-3Juta' ? 'selected' : '' }}>
                                                    Rp
                                                    1.000.000 -
                                                    Rp 3.000.000</option>
                                                <option value="3"
                                                    {{ old('penghasilan_ayah', $data->penghasilan_ayah) == '3Juta-5Juta' ? 'selected' : '' }}>
                                                    Rp
                                                    3.000.000 -
                                                    Rp 5.000.000</option>
                                                <option value="4"
                                                    {{ old('penghasilan_ayah', $data->penghasilan_ayah) == '5Juta-10Juta' ? 'selected' : '' }}>
                                                    Rp
                                                    5.000.000 -
                                                    Rp 10.000.000</option>
                                                <option value="5"
                                                    {{ old('penghasilan_ayah', $data->penghasilan_ayah) == '>10Juta' ? 'selected' : '' }}>
                                                    Di atas
                                                    Rp
                                                    10.000.000</option>

                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('penghasilan_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Add the pendidikan_terakir_ayah field -->


                                <!-- Add the no_wa_ayah field -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nama_ibu" type="text"
                                                class="form-control @error('nama_ibu') is-invalid @enderror"
                                                name="nama_ibu" value="{{ old('nama_ibu', $data->nama_ibu) }}"
                                                placeholder="Nama Ibu">
                                            @error('nama_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="no_wa_ibu" type="text"
                                                class="form-control @error('no_wa_ibu') is-invalid @enderror"
                                                name="no_wa_ibu" value="{{ old('no_wa_ibu', $data->no_wa_ibu) }}"
                                                placeholder="No. WhatsApp Ibu">
                                            @error('no_wa_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="pendidikan_terakir_ibu"
                                                class="form-select form-control @error('pendidikan_terakir_ibu') is-invalid @enderror"
                                                name="pendidikan_terakir_ibu">
                                                <option value="" disabled selected>Pilih Pendidikan Terakhir
                                                    Ibu
                                                </option>
                                                <option value="sd"
                                                    {{ old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 'sd' ? 'selected' : '' }}>
                                                    SD
                                                </option>
                                                <option value="smp"
                                                    {{ old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 'smp' ? 'selected' : '' }}>
                                                    SMP
                                                </option>
                                                <option value="sma"
                                                    {{ old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 'sma' ? 'selected' : '' }}>
                                                    SMA
                                                </option>
                                                <option value="d1/2/3"
                                                    {{ old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 'd1/2/3' ? 'selected' : '' }}>
                                                    D1/D2/D3
                                                </option>
                                                <option value="s1"
                                                    {{ old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 's1' ? 'selected' : '' }}>
                                                    S1
                                                </option>
                                                <option value="s2"
                                                    {{ old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 's2' ? 'selected' : '' }}>
                                                    S2
                                                </option>
                                                <option value="s3"
                                                    {{ old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 's3' ? 'selected' : '' }}>
                                                    S3
                                                </option>
                                            </select>
                                            @error('pendidikan_terakir_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="pekerjaan_ibu" type="text"
                                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                name="pekerjaan_ibu"
                                                value="{{ old('pekerjaan_ibu', $data->pekerjaan_ibu) }}"
                                                placeholder="Pekerjaan Ibu">
                                            @error('pekerjaan_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="penghasilan_ibu"
                                                class="form-select form-control @error('penghasilan_ibu') is-invalid @enderror"
                                                name="penghasilan_ibu">
                                                <option value="1" disabled selected>Pilih Kategori Penghasilan
                                                    Ibu
                                                </option>
                                                <option value="1"
                                                    {{ old('penghasilan_ibu', $data->penghasilan_ibu) == '<1Juta' ? 'selected' : '' }}>
                                                    Di bawah
                                                    Rp
                                                    1.000.000</option>
                                                <option value="2"
                                                    {{ old('penghasilan_ibu', $data->penghasilan_ibu) == '1Juta-3Juta' ? 'selected' : '' }}>
                                                    Rp
                                                    1.000.000 - Rp
                                                    3.000.000</option>
                                                <option value="3"
                                                    {{ old('penghasilan_ibu', $data->penghasilan_ibu) == '3Juta-5Juta' ? 'selected' : '' }}>
                                                    Rp
                                                    3.000.000 - Rp
                                                    5.000.000</option>
                                                <option value="4"
                                                    {{ old('penghasilan_ibu', $data->penghasilan_ibu) == '5Juta-10Juta' ? 'selected' : '' }}>
                                                    Rp
                                                    5.000.000 - Rp
                                                    10.000.000</option>
                                                <option value="5"
                                                    {{ old('penghasilan_ibu', $data->penghasilan_ibu) == '>10Juta' ? 'selected' : '' }}>
                                                    Di atas
                                                    Rp
                                                    10.000.000</option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('penghasilan_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <h3>Data Wali Siswa</h3>
                                <h6 class="mb-3" style="color:black;">*opsional</h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nama_wali_siswa" type="text"
                                                class="form-control @error('nama_wali_siswa') is-invalid @enderror"
                                                name="nama_wali_siswa"
                                                value="{{ old('nama_wali_siswa', $data->nama_wali_siswa) }}"
                                                placeholder="Nama Wali Siswa">
                                            @error('nama_wali_siswa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="no_wa_wali_siswa" type="text"
                                                class="form-control @error('no_wa_wali_siswa') is-invalid @enderror"
                                                name="no_wa_wali_siswa"
                                                value="{{ old('no_wa_wali_siswa', $data->no_wa_wali_siswa) }}"
                                                placeholder="No. WhatsApp Wali Siswa">
                                            @error('no_wa_wali_siswa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="hubungan_dengan_siswa" type="text"
                                                class="form-control @error('hubungan_dengan_siswa') is-invalid @enderror"
                                                name="hubungan_dengan_siswa"
                                                value="{{ old('hubungan_dengan_siswa', $data->hubungan_dengan_siswa) }}"
                                                placeholder="Hubungan dengan Siswa">
                                            @error('hubungan_dengan_siswa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="alamat_wali_siswa" type="text"
                                                class="form-control @error('alamat_wali_siswa') is-invalid @enderror"
                                                name="alamat_wali_siswa"
                                                value="{{ old('alamat_wali_siswa', $data->alamat_wali_siswa) }}"
                                                placeholder="Alamat Wali Siswa">
                                            @error('alamat_wali_siswa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="pendidikan_terakir_wali"
                                                class="form-select form-control @error('pendidikan_terakir_wali') is-invalid @enderror"
                                                name="pendidikan_terakir_wali">
                                                <option value="0" disabled selected>Pilih Pendidikan
                                                    Terakhir Wali
                                                </option>
                                                <option value="sd"
                                                    {{ old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 'sd' ? 'selected' : '' }}>
                                                    SD
                                                </option>
                                                <option value="smp"
                                                    {{ old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 'smp' ? 'selected' : '' }}>
                                                    SMP
                                                </option>
                                                </option>
                                                <option value="sma"
                                                    {{ old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 'sma' ? 'selected' : '' }}>
                                                    SMA
                                                </option>
                                                <option value="d1/2/3"
                                                    {{ old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 'd1/2/3' ? 'selected' : '' }}>
                                                    D1/D2/D3
                                                </option>
                                                <option value="s1"
                                                    {{ old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 's1' ? 'selected' : '' }}>
                                                    S1
                                                </option>
                                                <option value="s2"
                                                    {{ old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 's2' ? 'selected' : '' }}>
                                                    S2
                                                </option>
                                                <option value="s3"
                                                    {{ old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 's3' ? 'selected' : '' }}>
                                                    S3
                                                </option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('pendidikan_terakir_wali')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="pekerjaan_wali" type="text"
                                                class="form-control @error('pekerjaan_wali') is-invalid @enderror"
                                                name="pekerjaan_wali"
                                                value="{{ old('pekerjaan_wali', $data->pekerjaan_wali) }}"
                                                placeholder="Pekerjaan Wali">
                                            @error('pekerjaan_wali')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="penghasilan_wali"
                                                class="form-select form-control @error('penghasilan_wali') is-invalid @enderror"
                                                name="penghasilan_wali">
                                                <option value="0" disabled selected>Pilih Kategori
                                                    Penghasilan Wali
                                                </option>
                                                <option value="1"
                                                    {{ old('penghasilan_wali', $data->penghasilan_wali) == '<1Juta' ? 'selected' : '' }}>
                                                    Di
                                                    bawah Rp
                                                    1.000.000</option>
                                                <option value="2"
                                                    {{ old('penghasilan_wali', $data->penghasilan_wali) == '1Juta-3Juta' ? 'selected' : '' }}>
                                                    Rp
                                                    1.000.000 -
                                                    Rp 3.000.000</option>
                                                <option value="3"
                                                    {{ old('penghasilan_wali', $data->penghasilan_wali) == '3Juta-5Juta' ? 'selected' : '' }}>
                                                    Rp
                                                    3.000.000 -
                                                    Rp 5.000.000</option>
                                                <option value="4"
                                                    {{ old('penghasilan_wali', $data->penghasilan_wali) == '5Juta-10Juta' ? 'selected' : '' }}>
                                                    Rp
                                                    5.000.000 -
                                                    Rp 10.000.000</option>
                                                <option value="5"
                                                    {{ old('penghasilan_wali', $data->penghasilan_wali) == '>10Juta' ? 'selected' : '' }}>
                                                    Di
                                                    atas Rp
                                                    10.000.000</option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('penghasilan_wali')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger btn-block">Back</a>
                            </form>
                        {{-- </div>
                    </div>
                </div> --}}
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    </body>

@stop
