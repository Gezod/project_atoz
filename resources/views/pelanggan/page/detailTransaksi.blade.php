@extends('pelanggan.layout.index')

@section('content')
    <div class="container mt-5">
        <div class="card w-50">
            <div class="card-header">
                <h4>Total yang harus dibayar</h4>
            </div>
            <div class="card-body">
                <h6>Id Transaksi {{ $data->code_transaksi }}</h6>
                <h6>{{ $data->nama_customer }}</h6>
                <h6>{{ number_format($data->total_harga) }}</h6>
            </div>

            <div class="p-2">
                <button class="btn btn-success" id="pay-button">Bayar Sekarang</button>
            </div>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        snap.pay('{{ $token }}', {
            onSuccess: function(result) {
                console.log(result);
                alert('Pembayaran berhasil!');
            },
            onPending: function(result) {
                console.log(result);
                alert('Pembayaran sedang diproses!');
            },
            onError: function(result) {
                console.log(result);
                alert('Pembayaran gagal!');
            },
            onClose: function() {
                alert('Anda menutup pop-up tanpa menyelesaikan pembayaran.');
            }
        });
    };
</script>

@endsection
