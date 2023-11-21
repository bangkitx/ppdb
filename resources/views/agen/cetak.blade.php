<!DOCTYPE html>

<head>
    <title>SURAT PERNYATAAN CALON WALI MURID SMP TAHFIZHUL QUR'AN PANGERAN DIPONEGORO</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
            line-height: 0.5;
            /* Adjust this value as needed */

        }

        .halaman {
            width: 75%;
            /* Set the width of the content container */
            margin: 0 auto;
            /* Center the content horizontally */
            border: 1px solid #000;
            /* Add a border around the content */
            padding: 20px;
            /* Add padding to the content container */
        }

        #signature-container {
            margin-top: 3rem;
            /* Align contents to the right */
            width: 100%;
            /* Use the full width of the container */
        }

        .signature {
            text-align: right;
        }

        @media print {
            .halaman {
                width: auto;
                height: auto;
                position: absolute;
                border: none;
                /* Remove the border in print mode */
                padding-top: 15px;
                padding-left: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
            }

            #signature-container {
                margin-top: 3rem;

                float: right;
                width: 30%;
            }

            .signature {
                text-align: left;
            }
        }
    </style>

</head>

<body>
    <div class="halaman">
        <h3 id=judul>SURAT PERNYATAAN CALON WALI MURID</h3>
        <h3 id=judul>SMP TAHFIZHUL QUR'AN PANGERAN DIPONEGORO</h3>
        <h3 id=judul>TAHUN AJARAN   {{ \Carbon\Carbon::now()->format('Y') }}/{{ \Carbon\Carbon::now()->addYear()->format('Y') }}</h3>

        <p>Yang bertandatangan di bawah ini:</p>
        @if ($agen->pekerjaan_ayah == "Almarhum" && $agen->pekerjaan_ibu == "Almarhum")
            <table>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->nama_wali_siswa }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Pekerjaan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->pekerjaan_wali }}</td>
                </tr>
                <tr>
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $agen->alamat }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">No. Telp</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->no_wa_wali_siswa }}</td>
                </tr>
            </table>
        @elseif ($agen->pekerjaan_ayah == "Almarhum")
            <table>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->nama_ibu }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Pekerjaan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->pekerjaan_ibu }}</td>
                </tr>
                <tr>
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $agen->alamat }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">No. Telp</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->no_wa_ibu }}</td>
                </tr>
            </table>
        @elseif ($agen->pekerjaan_ibu == "Almarhum")
            <table>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->nama_ayah }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Pekerjaan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $agen->alamat }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">No. Telp</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->no_wa_ayah }}</td>
                </tr>
            </table>
        @else
            <table>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->nama_ayah }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Pekerjaan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $agen->alamat }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">No. Telp</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $agen->no_wa_ayah }}</td>
                </tr>
            </table>
        @endif

        <p>adalah Orang Tua/Wali dari siswa calon SMP Tahfizhul Qur’an Pangeran Diponegoro Semarang
            Tahun Ajaran   {{ \Carbon\Carbon::now()->format('Y') }}/{{ \Carbon\Carbon::now()->addYear()->format('Y') }}.</p>
        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $agen->nama_lengkap }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Asal sekolah</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $agen->asal_sekolah }}</td>
            </tr>
        </table>

        <p>Menyatakan hal-hal sebagai berikut :</p>
        <p>1. Jika siswa tersebut di atas diterima/lulus dalam seleksi Penerimaan siswa SMP Tahfizhul
            Qur’an Pangeran Diponegoro Tahun Ajaran   {{ \Carbon\Carbon::now()->format('Y') }}/{{ \Carbon\Carbon::now()->addYear()->format('Y') }}, saya akan taat dan patuh sepenuhnya
            dengan segala kebijakan sekolah.</p>
        <p>2. Jika siswa tersebut di atas diterima/lulus dalam seleksi Penerimaan siswa SMP Tahfizhul
            Qur’an Pangeran Diponegoro Tahun Ajaran 2  {{ \Carbon\Carbon::now()->format('Y') }}/{{ \Carbon\Carbon::now()->addYear()->format('Y') }}, saya akan bertanggungjawab atas
            semua pembiayaan selama siswa tersebut belajar di SMP Tahfizhul Qur’an Pangeran
            Diponegoro.
        </p>
        <p>3. Pada saat pendaftaran ulang saya bersedia membayar biaya yang akan dilunasi terhitung dari
            tanggal___________________sebesar Rp__________________dan sisanya bisa dilunasi paling lambat
            ___________________.</p>
        <p>4. Apabila anak saya mengundurkan diri setelah mendaftar ulang, maka biaya yang telah
            dibayarkan akan dikembalikan sebesar 10% dan sisanya dianggap sebagai wakaf
            pembangunan SMPTQ Pangeran Diponegoro.
        </p>
        <p>Demikian, data dalam formulir ini telah saya isi dengan sebenar-benarnya. Jika pernyataan saya ini
            tidak benar atau pembayaran tidak dilaksanakan sesuai dengan data yang tercantum dalam formulir
            ini, maka calon siswa tersebut diatas dinyatakan mengundurkan diri SMP Tahfizhul Qur’an
            Pangeran Diponegoro.</p>

        <div id="signature-container">
            <div class="signature">Semarang, _______________</div>
            <div class="signature">Yang bertanda tangan,</div>
            <br><br>
            <div class="signature">Materai 10.000,00</div>
            <br><br>
            <div class="signature">(_______________________)</div>
        </div>

    </div>
</body>

</html>

<script>
    window.print()
</script>
