<?php

namespace App\Http\Controllers;

use App\Models\modelDetailTransaksi;
use App\Models\product;
use App\Models\tblCart;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mockery\Undefined;
use RealRashid\SweetAlert\Facades\Alert;  // Model cart Anda
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function showPaymentPage($id)
    {
        $find_data = Transaksi::findOrFail($id); // Cari transaksi berdasarkan ID
        $countKeranjang = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $find_data->code_transaksi,
                'gross_amount' => $find_data->total_harga,
            ],
            'customer_details' => [
                'first_name' => 'Mr',
                'last_name' => $find_data->nama_customer,
                'phone' => $find_data->no_tlp,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('pelanggan.page.payment', [
            'data' => $find_data,
            'token' => $snapToken,
            'count' => $countKeranjang,
        ]);
    }
}
