<!DOCTYPE html>

<head>
    <title>KARTU PESERTA UJIAN PPDB SMP TAHFIZHUL QUR'AN PANGERAN DIPONEGORO</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
            line-height: 0.5;
            /* Adjust this value as needed */

        }

        * {
            line-height: 1.5;
            box-sizing: border-box;
        }

        header {
            border-bottom: 1px solid #000;
            position: relative;
        }

        header::after {
            content: "";
            display: block;
            position: absolute;
            bottom: 1px;
            width: 100%;
            border-bottom: 2px solid #000;
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
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 2px solid #000;
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

        .container {
            padding: 20px 64px;
            /* display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px; */
            border: 1px solid #000;
            height: 100%;
            margin: 20px 0;
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
        }

        .data-diri {
            /* flex: 1 1 auto; */
            margin: auto 0;
            display: flex;
            align-items: stretch;
        }

        .image-container {
            width: 3cm;
            height: 4cm;
            border: 1px solid #000;
            padding: 8px;
        }

        img {
            width: 100%;
            height: 100%;
        }

        tr {
            font-size: larger;
        }

        body {
            height: 75vh;
            /* border: 2px solid red; */
        }

        @page {
            size: landscape;
        }

        @media print {
            .halaman {
                width: 100%;
                position: absolute;
                inset: 0;
                /* Remove the border in print mode */

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
        <header>
            <h1 id=judul>KARTU PESERTA UJIAN PPDB</h1>
            <h1 id=judul>TAHUN PELAJARAN
                <?php echo e(\Carbon\Carbon::now()->format('Y')); ?>/<?php echo e(\Carbon\Carbon::now()->addYear()->format('Y')); ?></h1>
        </header>

        <div class="container">
            <h2 style="text-align: center; ">Nomor Peserta : </h2>
            <h1 style="text-align: center; "><?php echo e($data->nomor_peserta); ?></h1>

            <div class="data-diri">
                <table style="flex: 1 1 auto; ">
                    <tr style="width: 100%">
                        <th style="width: 30%; text-align:left;">Nama</th>
                        <td style="width: 5%;">:</td>
                        <td style="width: 65%;"><?php echo e($data->nama_lengkap); ?></td>
                    </tr>
                    <tr style="width: 100%">
                        <th style="width: 30%; text-align:left; ">NISN</th>
                        <td style="width: 5%; ">:</td>
                        <td style="width: 65%;"><?php echo e($data->nisn); ?></td>
                    </tr>
                    <tr style="width: 100%">
                        <th style="width: 30%; text-align:left;">Asal Sekolah</th>
                        <td style="width: 5%;">:</td>
                        <td style="width: 65%;"><?php echo e($data->asal_sekolah); ?></td>
                    </tr>
                </table>

                <div class="image-container">
                    <img src="<?php echo e(asset($avatar)); ?>" alt="FOTO">
                </div>


            </div>

            <h4 style=""><span style="color: #ff5100">*</span>Saya bersumpah untuk tidak melakukan kecurangan
                dalam mengikuti ujian!</h4>

        </div>
    </div>

</body>

<script>
    window.print()
</script>
<?php /**PATH C:\laragon\www\ppdb\resources\views/siswa/cetak-kartu.blade.php ENDPATH**/ ?>