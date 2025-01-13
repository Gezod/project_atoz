@extends('pelanggan.layout.index')

@section('content')
    <div class="row mt-4 align-items-center">
        <div class="col-md-6">
            <div class="content-text">
                Selamat datang di AtoZ, platform thrift store online yang menyediakan pilihan terbaik pakaian pria dan wanita dewasa dengan harga terjangkau dan kualitas yang terjamin.
                Kami menghadirkan berbagai kategori fashion seperti baju, celana, dan aksesoris, semuanya telah melalui proses kurasi yang teliti untuk memastikan kenyamanan dan gaya Anda tetap terjaga.
                AtoZ berkomitmen untuk mendukung gaya hidup berkelanjutan dengan mengedepankan prinsip reuse dan recycle melalui produk-produk thrift berkualitas tinggi. Dengan berbagai pilihan model terkini, Anda bisa menemukan fashion favorit tanpa harus mengorbankan dompet ataupun lingkungan.
                Nikmati pengalaman belanja yang mudah, cepat, dan aman melalui platform kami, dilengkapi dengan berbagai metode pembayaran terpercaya dan fitur yang ramah pengguna. Temukan pakaian impian Anda sekarang di AtoZ Thrift Store, karena fashion yang baik dimulai dari langkah yang bijak!
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/images/orang.png') }}" style="width:100%" alt="">
        </div>
    </div>

    <div class="d-flex justify-content-lg-between mt-5">
        <div class="d-flex align-items-center gap-4">
            <i class="fa fa-users fa-2x"></i>
            <p class="m-0 fs-5">+ 300 Pelanggan</p>
        </div>
        <div class="d-flex align-items-center gap-4">
            <i class="fas fa-home fa-2x"> </i>
            <p class="m-0 fs-5"> +500 Seller</p>
        </div>
        <div class="d-flex align-items-center gap-4">
            <i class="fas fa-shirt fa-2x"></i>
            <p class="m-0 fs-5">+ 300 Product</p>
        </div>
    </div>

    <h4 class="text-center mt-md-5 mb-md-2">Contact Us</h4>
    <hr class="mb-5">
    <div class="row  mb-md-5">
        <div class="col-md-5">
            <div class="bg-secondary" style="width: 100%; height:50vh; border-radius:10px;"></div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Kritik dan saran</h4>
                </div>
                <div class="card-body">
                    <p class="p-0 mb-5 text-lg-center">Masukan kritik dan saran anda kepada aplikasi kami ini agar kami dapat memberikan
                        apa yang menjadi kebutuhan anda dan kami dapat berkembang lebih baik lagi.
                    </p>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" value=""
                                placeholder="Masukan email Anda">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pesan" placeholder="Masukan Pesan Anda">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-4 w-100"> Kirim pesan anda</button>
                </div>
            </div>
        </div>
    </div>
@endsection
