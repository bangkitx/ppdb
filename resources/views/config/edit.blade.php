@extends('layouts.main')

@section('container')
    <h2 class="mb-3">Konfigurasi Tanggal PPDB</h2>

    <form action="/config/update" method="post">
        {!! csrf_field() !!}
        @method('PUT')
        <div class="container mb-5">
            <div class="table-responsive">
                <table class="table table-striped mb-5">
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
                            <td><input type="date" id="pendaftaran_akun_ppdb_start" name="pendaftaran_akun_ppdb_start"
                                    aria-label="pendaftaran_akun_ppdb_start" class="form-control"
                                    value="{{ $config->pendaftaran_akun_ppdb_start }}"></td>
                            <td><input type="date" id="pendaftaran_akun_ppdb_due" name="pendaftaran_akun_ppdb_due"
                                    aria-label="pendaftaran_akun_ppdb_due" class="form-control"
                                    value="{{ $config->pendaftaran_akun_ppdb_due }}"></td>
                        </tr>
                        <tr>
                            <td>Pendaftaran Sekolah</td>
                            <td><input type="date" id="pengumpulan_berkas_start" name="pengumpulan_berkas_start"
                                    aria-label="pengumpulan_berkas_start" class="form-control"
                                    value="{{ $config->pengumpulan_berkas_start }}"></td>
                            <td><input type="date" id="pengumpulan_berkas_due" name="pengumpulan_berkas_due"
                                    aria-label="pengumpulan_berkas_due" class="form-control"
                                    value="{{ $config->pengumpulan_berkas_due }}"></td>
                        </tr>
                        <tr>
                            <td>Tes Akademik</td>
                            <td><input type="date" id="test_akademik_start" name="test_akademik_start"
                                    aria-label="test_akademik_start" class="form-control"
                                    value="{{ $config->test_akademik_start }}"></td>
                            <td><input type="date" id="test_akademik_due" name="test_akademik_due"
                                    aria-label="test_akademik_due" class="form-control"
                                    value="{{ $config->test_akademik_due }}"></td>
                        </tr>
                        <tr>
                            <td>Tes Baca Al-Qur'an</td>
                            <td><input type="date" id="test_baca_al_quran_start" name="test_baca_al_quran_start"
                                    aria-label="test_baca_al_quran_start" class="form-control"
                                    value="{{ $config->test_baca_al_quran_start }}"></td>
                            <td><input type="date" id="test_baca_al_quran_due" name="test_baca_al_quran_due"
                                    aria-label="test_baca_al_quran_due" class="form-control"
                                    value="{{ $config->test_baca_al_quran_due }}"></td>
                        </tr>
                        {{-- <tr>
                        <td>Tes Wawancara</td>
                        <td><input type="date" id="test_wawancara_start" name="test_wawancara_start" aria-label="test_wawancara_start" class="form-control" value="{{$config->test_wawancara_start}}"></td>
                        <td><input type="date" id="test_wawancara_due" name="test_wawancara_due" aria-label="test_wawancara_due" class="form-control" value="{{$config->test_wawancara_due}}"></td>
                    </tr> --}}
                        <tr>
                            <td>Pendaftaran Ulang</td>
                            <td><input type="date" id="pendaftaran_ulang_start" name="pendaftaran_ulang_start"
                                    aria-label="pendaftaran_ulang_start" class="form-control"
                                    value="{{ $config->pendaftaran_ulang_start }}"></td>
                            <td><input type="date" id="pendaftaran_ulang_due" name="pendaftaran_ulang_due"
                                    aria-label="pendaftaran_ulang_due" class="form-control"
                                    value="{{ $config->pendaftaran_ulang_due }}"></td>
                        </tr>
                        <tr>
                            <td>Gelombang Pendaftaran</td>
                            <td colspan="2">
                                <select id="gelombang"
                                    class="form-select form-control @error('gelombang') is-invalid @enderror"
                                    name="gelombang" required>
                                    <option value="" selected disabled>Pilih Gelombang
                                    </option>
                                    <option value="Gelombang 1" {{ old('gelombang') == 'Gelombang 1' ? 'selected' : '' }}>
                                        Gelombang 1
                                    </option>
                                    <option value="Gelombang 2" {{ old('gelombang') == 'Gelombang 2' ? 'selected' : '' }}>
                                        Gelombang 2
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </tr>
                            <td>Link WhatsApp</td>
                            <td colspan="2"><input type="name" id="redirect_wa" name="redirect_wa"
                                    aria-label="redirect_wa" class="form-control" value="{{ $config->redirect_wa }}"></td>
                            
                            <tr>
                             <td>Pesan Informasi</td>
                             <td colspan="2"><input type="name" id="pesan" name="pesan" maxlength="1000"
                                aria-label="pesan" class="form-control" value="{{ $config->pesan }}"></td>
                            </tr>
                            {{-- <tr>
                                <td>Surat Pernyataan</td>
                                <td colspan="2">
                                    
                                <label for="upload" class="input-group-text" style="background-color: white;">
                                         File
                                        &nbsp;<span class="fas fa-file-upload fa-3"></span>
                                        </label>
                                    <input type="file" class="form-control @error('upload') is-invalid @enderror"
                                        id="upload" name="upload" accept=".pdf" style="display: none;">
                                    @error('upload')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                
                                </td>
                        </tr> --}}
                        <tr>
                            <td>Kelulusan</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pengumuman" value="0"
                                        id="pengumuman_tutup" {{ old('pengumuman') == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pengumuman_tutup">Tutup</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pengumuman" value="1"
                                        id="pengumuman_buka" {{ old('pengumuman') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pengumuman_buka">Buka</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Biaya Registrasi</td>
                            <td colspan="2"><input type="name" id="nominal_pembayaran" name="nominal_pembayaran"
                                    aria-label="nominal_pembayaran" class="form-control"
                                    value="{{ $config->nominal_pembayaran }}"></td>
                            {{-- <td><input type="date" id="pendaftaran_ulang_due" name="pendaftaran_ulang_due" aria-label="pendaftaran_ulang_due" class="form-control" value="{{$config->pendaftaran_ulang_due}}"></td> --}}
                        </tr>

                    </tbody>

                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="3">
                                Midtrans Configuration
                            </th>
                            {{-- <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th> --}}
                        </tr>
                    </thead>
                    <tr>
                        <td>Merchant ID</td>
                        <td colspan="2">
                            <input type="name" id="midtrans_merchant_id" name="midtrans_merchant_id"
                                aria-label="midtrans_merchant_id" class="form-control"
                                value="{{ $config->midtrans_merchant_id }}">
                        </td>
                        {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                    </tr>
                    <tr>
                        <td>Midtrans Client Key</td>
                        <td colspan="2">
                            <input type="name" id="midtrans_client_key" name="midtrans_client_key"
                                aria-label="midtrans_client_key" class="form-control"
                                value="{{ $config->midtrans_client_key }}">
                        </td>
                        {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                    </tr>
                    <tr>
                        <td>Midtrans Server Key</td>
                        <td colspan="2">
                            <input type="name" id="midtrans_server_key" name="midtrans_server_key"
                                aria-label="midtrans_server_key" class="form-control"
                                value="{{ $config->midtrans_server_key }}">
                        </td>
                        {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                    </tr>
                    <tr>
                        <td>Midtrans Order ID</td>
                        {{-- <td colspan="2"> --}}
                        <td colspan="2">
                            <input type="name" id="order_id_midtrans" name="order_id_midtrans"
                                aria-label="order_id_midtrans" class="form-control"
                                value="{{ $config->order_id_midtrans }}">
                        </td>
                        {{-- </td> --}}
                        {{-- <td>{{ $config->pendaftaran_ulang_due }}</td> --}}
                    </tr>
                </table>
            </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Submit perubahan</a>

    </form>
    <script>
        const avatarInput = document.getElementById('upload');
        const avatarLabel = document.querySelector('label[for="upload"]');
        
        avatarInput.addEventListener('change', function() {
          const filename = avatarInput.files[0].name;
          avatarLabel.textContent = filename;
        });
    </script>
@endsection

