<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPDB SMP SMPTQ Pangeran Diponegoro</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/templateadmin.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js" defer></script>
    <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<div class="card">
    <div class="card-body">
        <center>
            <h1 class="mb-5">Data Pendaftaran Siswa {{ $agen->nama_lengkap }}</h1>
        </center>
        <!-- Section 1: Data Pribadi -->
        <h3>Data Pribadi</h3>
        <table class="table table-striped mb-5">
            <tbody>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $agen->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>NISN</th>
                    <td>{{ $agen->nisn }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $agen->email }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $agen->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>{{ $agen->tempat_lahir }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $agen->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $agen->alamat }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>{{ $agen->agama }}</td>
                </tr>
                <tr>
                    <th>Asal Sekolah</th>
                    <td>{{ $agen->asal_sekolah }}</td>
                </tr>
                <tr>
                    <th>Alamat Sekolah</th>
                    <td>{{ $agen->alamat_sekolah }}</td>
                </tr>
                <tr>
                    <th>Jumlah Hafalan</th>
                    <td>{{ $agen->jumlah_hafalan }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Section 2: Informasi Keluarga -->
        <h3>Informasi Keluarga</h3>
        <table class="table table-striped mb-5">
            <tbody>
                <tr>
                    <th>Nama Ayah</th>
                    <td>{{ $agen->nama_ayah }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan Ayah</th>
                    <td>{{ $agen->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <th>Penghasilan Ayah</th>
                    <td>{{ $agen->penghasilan_ayah }}</td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir Ayah</th>
                    <td>{{ $agen->pendidikan_terakir_ayah }}</td>
                </tr>
                <tr>
                    <th>No. WhatsApp Ayah</th>
                    <td>{{ $agen->no_wa_ayah }}</td>
                </tr>
                <tr>
                    <th>Nama Ibu</th>
                    <td>{{ $agen->nama_ibu }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan Ibu</th>
                    <td>{{ $agen->pekerjaan_ibu }}</td>
                </tr>
                <tr>
                    <th>Penghasilan Ibu</th>
                    <td>{{ $agen->penghasilan_ibu }}</td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir Ibu</th>
                    <td>{{ $agen->pendidikan_terakir_ibu }}</td>
                </tr>
                <tr>
                    <th>No. WhatsApp Ibu</th>
                    <td>{{ $agen->no_wa_ibu }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Section 3: Data Wali Siswa -->
        <h3>Data Wali Siswa</h3>
        <table class="table table-striped mb-5">
            <tbody>
                <tr>
                    <th>Nama Wali Siswa</th>
                    <td>{{ $agen->nama_wali_siswa }}</td>
                </tr>
                <tr>
                    <th>Hubungan dengan Siswa</th>
                    <td>{{ $agen->hubungan_dengan_siswa }}</td>
                </tr>
                <tr>
                    <th>Alamat Wali Siswa</th>
                    <td>{{ $agen->alamat_wali_siswa }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan Wali</th>
                    <td>{{ $agen->pekerjaan_wali }}</td>
                </tr>
                <tr>
                    <th>Penghasilan Wali</th>
                    <td>{{ $agen->penghasilan_wali }}</td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir Wali</th>
                    <td>{{ $agen->pendidikan_terakir_wali }}</td>
                </tr>
                <tr>
                    <th>No. WhatsApp Wali Siswa</th>
                    <td>{{ $agen->no_wa_wali_siswa }}</td>
                </tr>
            </tbody>
        </table>

        <h3>Policy</h3>
        <table class="table table-striped mb-5">
            <tbody>
                <tr>
                    <th>Policy (1)</th>
                    <td>{{ $agen->policy->perjanjian1 }}</td>
                </tr>
                <tr>
                    <td colspan="2">Percaya dan taat sepenuhnya kepada kebijaksanaan SMPTQ</td>
                </tr>
                <tr>
                    <th>Policy (2)</th>
                    <td>{{ $agen->policy->perjanjian2 }}</td>
                </tr>
                <tr>
                    <td colspan="2">Mendukung sunnah dan disiplin yang berlaku di SMPTQ</td>
                </tr>
                <tr>
                    <th>Policy (3)</th>
                    <td>{{ $agen->policy->perjanjian3 }}</td>
                </tr>
                <tr>
                    <td colspan="2">Memenuhi segala kewajiban yang telah ditetapkan oleh SMPTQ</td>
                </tr>
                <tr>
                    <th>Policy (4)</th>
                    <td>{{ $agen->policy->perjanjian4 }}</td>
                </tr>
                <tr>
                    <td colspan="2">Melunasi semua pembayaran uang sekolah dan uang makan sebelum Ujian Semester
                        Ganjil dan
                        Semester Genap</td>
                </tr>
                <!-- Add more rows for other policy information -->
            </tbody>
        </table>

        <h3>Nilai</h3>
        <table class="table table-striped mb-5">
            <tbody>
                <tr>
                    <th>Akademik</th>
                    <td>{{ $agen->nilai->akademik }}</td>
                </tr>
                <tr>
                    <th>Tes Baca Al-Qur'an</th>
                    <td>{{ $agen->nilai->test_membaca_al_quran }}</td>
                </tr>
                <tr>
                    <th>Status Kelulusan</th>
                    <td>{{ $agen->nilai->status }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Section 4: Lainnya -->
        <h3>Lainnya</h3>
        <table class="table table-striped mb-5">
            <tbody>
                <tr>
                    <th>Motivasi</th>
                    <td>{{ $agen->motivasi }}</td>
                </tr>
                <tr>
                    <th>Daftar Sekolah Lain</th>
                    <td>
                        @if ($agen->daftar_sekolah_lain == 1)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Nama Sekolah Jika Daftar</th>
                    <td>{{ $agen->nama_sekolahnya_jika_daftar }}</td>
                </tr>
                <tr>
                    <th>Informasi Didapatkan Dari</th>
                    <td>{{ $agen->informasi_didapatkan_dari }}</td>
                </tr>
                <!-- Add more rows for other additional information -->
            </tbody>
        </table>
        {{-- @if (!is_null($siswaagen->registrasi_ulang)) --}}
        {{-- @else
            No data for registration ulang.
        @endif --}}
    </div>
</div>
<script>
    window.print()
</script>
