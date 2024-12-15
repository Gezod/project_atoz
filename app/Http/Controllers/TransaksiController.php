<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\transaksi;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use App\Models\product;
use App\Models\tblCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()){
            $countKeranjang = 0;

        }else{
            $countKeranjang = tblCart::where(['idUser' => Auth::user()->id, 'status' => 0])->count();
        }
        $best = product::where('quantity_out','>=',5)->get();
        $data = product::paginate(15);
        // $countKeranjang = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('pelanggan.page.home', [
            'title'     => 'Home',
            'data'      => $data,
            'best'      => $best,
            'count'     => $countKeranjang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addTocart(Request $request)
    {
        if(!Auth::user()){
            Alert::toast('Login terlebih dahulu !', 'warning');
            return back();
        }else{
            
            $idProduct = $request->input('idProduct');

            $db = new tblCart ;
            $product = product::find($idProduct);
            $field = [
                'idUser'    => Auth::user()->id,
                'id_barang' => $idProduct,
                'qty'       => 1,
                'price'     => $product->harga,
            ];

            $db::create($field);
            Alert::toast('Berhasil menambahkan ke keranjang!', 'success');
            return redirect('/');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetransaksiRequest $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
