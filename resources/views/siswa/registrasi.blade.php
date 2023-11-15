@extends('layouts.main')

@section('container')
<div class="card  mb-5">
    <div class="card ">
        <div class="card-header">
            <h2>Upload File</h2>
        <form action="{{ route('registrasi_ulang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                    <div class="input-group ">
                        <td>Ijazah</td>
                            <td>
                                <div>
                                    <label for="ijazah" class="input-group-text d-flex align-items-center" style="background-color: white;">
                                            Upload File
                                            &nbsp;<span class="fas fa-file-upload fa-3"></span>
                                    </label>
                                    <input type="file" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah"
                                        name="ijazah" accept=".pdf,.docx" style="display: none;">
                                    @error('ijazah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </td>
                    </div>
                    </tr>
                    <tr>
                        <td>Surat Pernyataan Bermaterai</td>
                        <td>
                            <div>
                            <label for="surat_pernyataan_bermaterai" class="input-group-text d-flex align-items-center" style="background-color: white;">
                                    Upload File
                                    &nbsp;<span class="fas fa-file-upload fa-3"></span>
                            </label>
                            <input type="file"
                                class="form-control @error('surat_pernyataan_bermaterai') is-invalid @enderror"
                                id="surat_pernyataan_bermaterai" name="surat_pernyataan_bermaterai" accept=".pdf,.docx" style="display: none;">
                            @error('surat_pernyataan_bermaterai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Surat Keterangan Siswa Aktif SD Asal</td>
                        <td>
                            <div>
                            <label for="surat_keterangan_siswa_aktif_sd_asal" class="input-group-text d-flex align-items-center" style="background-color: white;">
                            Upload File
                            &nbsp;<span class="fas fa-file-upload fa-3"></span>
                            </label>
                            <input type="file"
                                class="form-control @error('surat_keterangan_siswa_aktif_sd_asal') is-invalid @enderror"
                                id="surat_keterangan_siswa_aktif_sd_asal" name="surat_keterangan_siswa_aktif_sd_asal"
                                accept=".pdf,.docx" style="display: none;">
                            @error('surat_keterangan_siswa_aktif_sd_asal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pasfoto</td>
                        <td>
                            <div>
                                <label for="pasfoto" class="input-group-text d-flex align-items-center" style="background-color: white;">
                                Upload File
                                &nbsp;<span class="fas fa-file-upload fa-3"></span>
                                </label>
                            <input type="file" class="form-control @error('pasfoto') is-invalid @enderror" id="pasfoto"
                                name="pasfoto" accept=".jpg,.jpeg,.png" style="display: none;">
                            @error('pasfoto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Akta Kelahiran</td>
                        <td>
                            <div>
                                <label for="akta_kelahiran" class="input-group-text d-flex align-items-center" style="background-color: white;">
                                Upload File
                                &nbsp;<span class="fas fa-file-upload fa-3"></span>
                                </label>
                            <input type="file" class="form-control @error('akta_kelahiran') is-invalid @enderror"
                                id="akta_kelahiran" name="akta_kelahiran" accept=".pdf,.docx" style="display: none;">
                            @error('akta_kelahiran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kartu Keluarga (KK)</td>
                        <td>
                            <div>
                                <label for="kk" class="input-group-text d-flex align-items-center" style="background-color: white;">
                                Upload File
                                &nbsp;<span class="fas fa-file-upload fa-3"></span>
                                </label>
                            <input type="file" class="form-control @error('kk') is-invalid @enderror" id="kk"
                                name="kk" accept=".pdf,.docx" style="display: none;">
                            @error('kk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="no_kk" class="form-label">Nomor Kartu Keluarga (KK)</label></td>
                        <td>
                            <input id="no_kk" type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                name="no_kk" required placeholder="Nomor KK">
                            @error('no_kk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nik_siswa" class="form-label">NISN Siswa</label></td>
                        <td>
                            <input id="nik_siswa" type="text"
                                class="form-control @error('nik_siswa') is-invalid @enderror" name="nik_siswa" required
                                placeholder="NISN Siswa">
                            @error('nik_siswa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nik_ayah" class="form-label">NIK Ayah</label></td>
                        <td>
                            <input id="nik_ayah" type="text"
                                class="form-control @error('nik_ayah') is-invalid @enderror" name="nik_ayah" required
                                placeholder="NIK Ayah">
                            @error('nik_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nik_ibu" class="form-label">NIK Ibu</label></td>
                        <td>
                            <input id="nik_ibu" type="text" class="form-control @error('nik_ibu') is-invalid @enderror"
                                name="nik_ibu" required placeholder="NIK Ibu">
                            @error('nik_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Sertifikat piagam</td>
                        <td>
                            <div>
                                <label for="sertifikat" class="input-group-text d-flex align-items-center" style="background-color: white;">
                                Upload File
                                &nbsp;<span class="fas fa-file-upload fa-3"></span>
                                </label>
                            <input type="file" class="form-control @error('sertifikat') is-invalid @enderror"
                                id="sertifikat" name="sertifikat" accept=".pdf" style="display: none;">
                            @error('sertifikat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            <button type="type" onclick="return confirm(&quot;Apakah anda yakin dengan data anda?&quot;)"
                class="btn btn-success btn-block">Upload</button>
        </form>
    </div>
</div>
</div>

<script>
const inputFiles = document.querySelectorAll('input[type="file"]');

for (const inputFile of inputFiles) {
    const label = document.querySelector('label[for="' + inputFile.id + '"]');

    inputFile.addEventListener('change', function() {
        const filename = inputFile.files[0].name;

        label.textContent = filename;
    });
}
</script>
    <script>
        function showSweetAlert() {
            Swal.fire({
                title: "Apakah anda sudah yakin dengan data yang akan anda submit?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Saya Yakin",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks "Ya, Saya Yakin," submit the form
                    document.querySelector('form').submit();
                }
            });
        }
    </script>
@endsection
