@extends('pelanggan.layout.index')

@section('content')
<div class="row mt-4 align-items-center">
    <div class="col-md-6">
        <div class="content-text">
            <h1 class="display-4">Welcome to AtoZ</h1>
            <p class="lead">Your premier destination for sustainable and stylish thrifting.</p>
            <p>At AtoZ, we bring together buyers and sellers to celebrate the art of thrifting while promoting eco-friendly fashion choices.</p>
            <h3 class="mt-4">Our Mission</h3>
            <p>We are passionate about reducing fashion waste and making second-hand shopping enjoyable and accessible. Our platform offers a diverse collection of pre-loved items, ensuring quality and authenticity in every piece.</p>
            <h3 class="mt-4">Why AtoZ?</h3>
            <ul>
                <li><strong>Diverse Collection:</strong> From vintage treasures to modern must-haves.</li>
                <li><strong>User-Friendly:</strong> Easy navigation for a smooth shopping experience.</li>
                <li><strong>Sustainable:</strong> Every purchase supports a greener planet.</li>
                <li><strong>Affordable:</strong> Unique finds at a fraction of retail prices.</li>
            </ul>
            <p>Join us at AtoZ and discover the joy of thrifting while contributing to a more sustainable future. Happy thrifting!</p>
            <p class="mt-4"><em>The AtoZ Team</em></p>
        </div>
    </div>
    <div class="col-md-6">
        <img src="{{ asset('assets/images/orang.png') }}" style="max-width: 150%; height: 100%;" alt="orang">


    </div>
</div>

<div class="d-flex justify-content-lg-between mt-5 text-center">
    <div class="d-flex align-items-center gap-4">
        <i class="fa fa-users fa-2x"></i>
        <p class="m-0 fs-5">+ 300 Pelanggan</p>
    </div>
    <div class="d-flex align-items-center gap-4">
        <i class="fas fa-home fa-2x"></i>
        <p class="m-0 fs-5">+ 500 Seller</p>
    </div>
    <div class="d-flex align-items-center gap-4">
        <i class="fas fa-shirt fa-2x"></i>
        <p class="m-0 fs-5">+ 300 Product</p>
    </div>
</div>

<h4 class="text-center mt-5 mb-2">Contact Us</h4>
<hr class="mb-5">
<div class="row mb-5">
    <div class="col-md-5">
        <div class="bg-secondary d-flex justify-content-center align-items-center" style="width: 100%; height:50vh; border-radius:10px;">
            <i class="fas fa-map-marker-alt fa-3x text-white"></i>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header text-center">
                <h4>Kritik dan Saran</h4>
            </div>
            <div class="card-body">
                <p class="text-center mb-5">Masukan kritik dan saran anda kepada aplikasi kami ini agar kami dapat memberikan
                    apa yang menjadi kebutuhan anda dan kami dapat berkembang lebih baik lagi.</p>
                <form>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Masukan email Anda">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="pesan" rows="4" placeholder="Masukan Pesan Anda"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 w-100">Kirim Pesan Anda</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
