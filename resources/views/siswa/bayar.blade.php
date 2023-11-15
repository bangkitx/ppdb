@extends('layouts.main')

@section('container')
    <h3 class="mb-3">Pembayaran {{ Auth::user()->name }}</h3>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container mb-5">
        <h6>Anda akan melakukan pembayaran sebesar:</h6>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rp</th>
                    <th>{{ $config->nominal_pembayaran }}</th>
                    {{-- <th>Tanggal Berakhir</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Terbilang</td>
                    <td>{{ $nominal }} rupiah</td>
                    {{-- <td></td> --}}
                </tr>
                <tr>
                    <td>Untuk</td>
                    <td>Biaya registrasi PPDB SMPITQ Pangeran Diponegoro</td>
                    {{-- <td></td> --}}
                </tr>
            </tbody>
        </table>
        <button type="button" id="pay-button" class="btn btn-success btn-block">Bayar biaya registrasi</a>

    </div>
    <hr>
    {{-- <a href="/" class="btn btn-warning btn-block">Cetak Datapokok</a> --}}
    <a href="/siswa" class="btn btn-warning btn-block">Kembali ke dashboard</a>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    Swal.fire({
                        icon: 'success',
                        title: 'Pembayaran kamu berhasil!',
                        showConfirmButton: false,
                        timer: 1500 // Display for 3 seconds
                    }).then(function() {
                        // Redirect after 3 seconds
                        window.location.href = "/siswa";
                    });
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    Swal.fire({
                        icon: 'warning',
                        title: 'Menunggu pembayaran kamu!',
                        showConfirmButton: false,
                        timer: 1500 // Display for 3 seconds
                    })
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    Swal.fire({
                        icon: 'error',
                        title: 'Pembayaran belum berhasil!',
                        showConfirmButton: false,
                        timer: 1500 // Display for 3 seconds
                    })
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    Swal.fire({
                        icon: 'warning',
                        title: 'Menunggu pembayaran kamu!',
                        showConfirmButton: false,
                        timer: 1500 // Display for 3 seconds
                    })
                }
            });
        });
    </script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
@endsection
