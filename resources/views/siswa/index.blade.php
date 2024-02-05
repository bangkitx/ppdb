@extends('layouts/main')

@section('container')
    <!-- Page Heading -->
    {{-- <div class="mb-4">
        <h1 class="h3 mb-2 text-gray-800">Selamat datang, {{ $user->name }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> --}}

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="card text-center mb-5">
        <div class="card-header bg-success text-white">
            <h2>SMPTQ PANGERAN DIPONEGORO</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title mb-4">Selamat datang, {{ $user->name }}</h5>
            <div class="row mb-4">
                <div class="col-md-6 d-flex justify-content-center">
                    <p class="card-text">
                    <div class="rounded-circle" style="width: 150px; height: 150px; overflow: hidden;">
                        <img class="img-fluid" src="{{ asset(Auth::user()->avatar) }}"
                            style="object-fit: cover; width: 100%; height: 100%;" alt="User Avatar">
                    </div>
                    </p>
                </div>
                @if ($agen == 'NULL')
                    <div class="col-md-6">
                        <p class="card-text">
                        <div class="row">
                            <div class="col-md-5 d-flex justify-content-start">
                                <span class="text-start">Nama:</span>
                            </div>
                            <div class="col-md-5 d-flex justify-content-start">Belum isi data pendaftaran</div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5 d-flex justify-content-start">
                                <span class="text-start">No. Peserta:</span>
                            </div>
                            <div class="col-md-5 d-flex justify-content-start">Belum isi data pendaftaran</div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5 d-flex justify-content-start">
                                <span class="text-start">Asal Sekolah:</span>
                            </div>
                            <div class="col-md-5 d-flex justify-content-start">Belum isi data pendaftaran</div>
                        </div>
                        </p>
                    </div>
                @else
                    <div class="col-md-6">
                        <p class="card-text">
                        <div class="row">
                            <div class="col-md-5 d-flex justify-content-start align-items-center">
                                <span class="text-start">Nama:</span>
                            </div>
                            <div class="col-md-5 d-flex justify-content-start align-items-center">{{ $agen->nama_lengkap }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5 d-flex justify-content-start align-items-center">
                                <span class="text-start">No. Peserta:</span>
                            </div>
                            <div class="col-md-5 d-flex justify-content-start align-items-center ">
                                {{ $agen->nomor_peserta }}
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-5 d-flex justify-content-start align-items-center">
                                <span class="text-start">Asal Sekolah:</span>
                            </div>
                            <div class="col-md-5 d-flex justify-content-start align-items-center">{{ $agen->asal_sekolah }}
                            </div>
                        </div>
                        <br>
                        <div class="col-md-9 d-flex justify-content-start align-items-center">
                            @if ($date_now > $config->pendaftaran_akun_ppdb_due)
                                <span class="alert alert-danger alert-block">Pendaftaran telah ditutup </span>
                            @else
                                <a target="_blank" href="{{ route('siswa.cetak_kartu', ['id' => $user->id]) }}"
                                    class="btn btn-primary btn-sm btn-block">
                                    <span class="fa fa-print"></span>
                                    <span class="ml-2">Cetak Kartu Peserta</span>
                                </a>
                            @endif
                        </div>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="alert alert-success" role="alert">
        @if ($date_now > $config->pendaftaran_akun_ppdb_due && $agen == 'NULL')
            <h4 class="alert-heading text-center">📢 Pengumuman Informasi Penting </h4>
            <p> {{ $config->pesan }} </p>
        @elseif ($config->pengumuman == 1 && $agen == 'NULL')
            <h4 class="alert-heading text-center">📢 Pengumuman Informasi Penting </h4>
            <p> {{ $config->pesan }} </p>
        @else
            <h4 class="alert-heading text-center">📢 Pengumuman Informasi Penting </h4>
            <p> {{ $config->pesan }} </p>
            <div>
                <p> Silakan kunjungi tautan berikut untuk bergabung: <a href="{{ $config->redirect_wa }}" target="_blank"
                        rel="nofollow">Join Grup WhatsApp</a>
            </div>
        @endif

        {{-- <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> --}}
    </div>
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @elseif (session('flash_message_danger'))
        <div class="alert alert-danger">
            {{ session('flash_message_danger') }}
        </div>
    @endif
    <div class="card text-center mb-5 shadow">
        <h3 class="card-header bg-success text-white">Aktivitas Pembayaran & Data Pendaftaran</h3>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <div class="card border-0 shadow rounded-lg mx-2" style="max-width: 300px;">
                        <form action="{{ route('payment.store') }}" method="post">
                            @csrf
                            @if ($date_now > $config->pendaftaran_akun_ppdb_due && $agen == 'NULL')
                                <img src="/images/bayar1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <span class="alert alert-danger alert-sm">Pembayaran ditutup</span>
                                </div>
                            @elseif ($config->pengumuman == 1 && !isset($payment))
                                <img src="/images/bayar1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <span class="alert alert-danger alert-sm">Pembayaran ditutup</span>
                                </div>
                            @else
                                @if (empty($payment))
                                    <img src="/images/bayar1.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Pembayaran</h5>
                                        <button type="submit" class="btn btn-danger btn-sm btn-block">Belum bayar</button>
                                    </div>
                                @elseif ($payment->status_payment !== 2 && $payment->status !== 2)
                                    <img src="/images/bayar1.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Pembayaran</h5>
                                        <a href="/bayar" class="btn btn-danger btn-sm btn-block">Selesaikan pembayaran</a>
                                    </div>
                                @else
                                    <img src="/images/bayar2.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Pembayaran</h5>
                                        <button class="btn btn-success btn-sm btn-block" disabled>Sudah bayar</button>
                                    </div>
                                @endif
                            @endif
                        </form>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card border-0 shadow rounded-lg mx-2" style="max-width: 300px;">
                        @if ($date_now > $config->pendaftaran_akun_ppdb_due && $agen == 'NULL')
                            <img src="/images/daftar1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span class="alert alert-danger alert-sm">Pendaftaran ditutup</span>
                            </div>
                        @elseif ($config->pengumuman == 1 && $agen == 'NULL')
                            <img src="/images/daftar1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span class="alert alert-danger alert-sm">Pendaftaran ditutup</span>
                            </div>
                        @else
                            @if (empty($payment))
                                <img src="/images/daftar1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pendaftaran</h5>
                                    <button class="btn btn-warning btn-sm btn-block" disabled>Bayar terlebih
                                        dahulu</button>
                                </div>
                            @elseif ($payment->status_payment !== 2 && $payment->status !== 2)
                                <img src="/images/daftar1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pendaftaran</h5>
                                    <button class="btn btn-warning btn-sm btn-block" disabled>Bayar terlebih
                                        dahulu</button>
                                </div>
                            @elseif ($agen == 'NULL')
                                <img src="/images/daftar1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pendaftaran</h5>
                                    <a href="/siswa/create" class="btn btn-danger btn-sm btn-block">Belum Isi</a>
                                </div>
                            @else
                                <img src="/images/daftar2.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pendaftaran</h5>
                                    <button class="btn btn-success btn-sm btn-block" disabled>Sukses</button>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card text-center mb-5 shadow">
        <h3 class="bg-success text-white py-2">Alur Seleksi</h3>
        <ul class="row progress-bar-steps d-flex justify-content-between align-items-center pt-4"">
            <!-- Langkah 1: Pendaftaran Akun PPDB -->
            <div class="col-6 col-md-4 col-lg">
                <li class="step">
                    @if ($date_now > $config->pendaftaran_akun_ppdb_start)
                        <img src="/images/font.png" class="step-icon" alt="Completed">
                    @else
                        <img src="/images/font11.png" class="step-icon" alt="Pending">
                    @endif
                    <p>Pendaftaran Akun</p>
                    <small>{{ $config->pendaftaran_akun_ppdb_start }} s/d {{ $config->pendaftaran_akun_ppdb_due }}</small>
                </li>
            </div>
            <!-- Langkah 2: Pengumpulan Berkas -->
            <div class="col-6 col-md-4 col-lg">
                <li class="step">
                    @if ($date_now > $config->pengumpulan_berkas_start)
                        <img src="/images/font2.png" class="step-icon" alt="Completed">
                    @else
                        <img src="/images/font22.png" class="step-icon" alt="Pending">
                    @endif
                    <p>Pendafataran PPDB</p>
                    <small>{{ $config->pengumpulan_berkas_start }} s/d {{ $config->pengumpulan_berkas_due }}</small>
                </li>
            </div>
            <!-- Langkah 3: Tes Akademik -->
            <div class="col-6 col-md-4 col-lg">
                <li class="step">
                    @if ($date_now > $config->test_akademik_start)
                        <img src="/images/font3.png" class="step-icon" alt="Completed">
                    @else
                        <img src="/images/font33.png" class="step-icon" alt="Pending">
                    @endif
                    <p>Tes Akademik</p>
                    <small>{{ $config->test_akademik_start }} s/d {{ $config->test_akademik_due }}</small>
                </li>
            </div>
            <!-- Langkah 4: Tes Baca Al-Quran -->
            <div class="col-6 col-md-4 col-lg">
                <li class="step">
                    @if ($date_now > $config->test_baca_al_quran_start)
                        <img src="/images/font4.png" class="step-icon" alt="Completed">
                    @else
                        <img src="/images/font44.png" class="step-icon" alt="Pending">
                    @endif
                    <p>Tes Baca Al-Quran</p>
                    <small>{{ $config->test_baca_al_quran_start }} s/d {{ $config->test_baca_al_quran_due }}</small>
                </li>
            </div>
            <!-- Langkah 5: Pendaftaran Ulang -->
            <div class="col-6 col-md-4 col-lg">
                <li class="step">
                    @if ($date_now > $config->pendaftaran_ulang_start)
                        <img src="/images/font5.png" class="step-icon" alt="Completed">
                    @else
                        <img src="/images/font55.png" class="step-icon" alt="Pending">
                    @endif
                    <p>Pendaftaran Ulang</p>
                    <small>{{ $config->pendaftaran_ulang_start }} s/d {{ $config->pendaftaran_ulang_due }}</small>
                </li>
            </div>
        </ul>
        <!-- Bagian footer -->
        <div class="card-footer mt-4">
            @if ($config->pengumuman == 0)
                <a href="#" onclick="alert('Pengumuman belum dibuka!');" class="btn btn-primary btn-block">Cek
                    Pengumuman</a>
            @elseif (!is_null(Auth::user()->datapokok) && Auth::user()->datapokok->nilai->akademik === 'Isi nilai A-E')
                <a href="#" onclick="alert('Kamu belum mempunyai nilai!');" class="btn btn-primary btn-block">Cek
                    Pengumuman</a>
            @else
                @if (empty($payment))
                    <a href="#" onclick="alert('Kamu belum melakukan pembayaran!');"
                        class="btn btn-primary btn-block">Cek Pengumuman</a>
                @elseif ($payment->status_payment !== 2 && $payment->status !== 2)
                    <a href="#" onclick="alert('Kamu belum menyelesaikan pembayaran!');"
                        class="btn btn-primary btn-block">Cek Pengumuman</a>
                @elseif ($agen == 'NULL')
                    <a href="#" onclick="alert('Kamu belum mengisi datapokok!');"
                        class="btn btn-primary btn-block">Cek Pengumuman</a>
                @elseif (Auth::user()->datapokok->nilai->akademik === 'Isi nilai A-E')
                    <a href="#" onclick="alert('Kamu belum mempunyai nilai!');"
                        class="btn btn-primary btn-block">Cek Pengumuman</a>
                @else
                    <a href="{{ url('/siswa/pengumuman/' . Auth::user()->id) }}" class="btn btn-primary btn-block">Cek
                        Pengumuman</a>
                @endif
            @endif
        </div>
    </div>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function fixAspect(img) {
            var $img = $(img),
                width = $img.width(),
                height = $img.height(),
                tallAndNarrow = width / height < 1;
            if (tallAndNarrow) {
                $img.addClass('tallAndNarrow');
            }
            $img.addClass('loaded');
        }
    </script>

    <script>
        // Using jQuery for simplicity, but you can use plain JavaScript as well
        $(document).ready(function() {

            // var payButton = document.getElementById('pay-button');

            // Add a click event listener to the "Bayar" button
            $('#exampleModal').on('click', '.btn-primary', function() {
                // Hide the current modal
                $('#exampleModal').modal('hide');

                // Show the second modal
                $('#secondModal').modal('show');
            });


        });
    </script>
@endsection
