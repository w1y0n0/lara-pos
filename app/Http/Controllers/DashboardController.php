<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $member = Member::count();

        $tanggal_awal  = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $tanggal_loop = $tanggal_awal;

        $data_tanggal = [];
        $data_pendapatan = [];

        while (strtotime($tanggal_loop) <= strtotime($tanggal_akhir)) {

            $data_tanggal[] = (int) date('d', strtotime($tanggal_loop));

            $total_penjualan = Penjualan::whereDate('created_at', $tanggal_loop)->sum('bayar');
            $total_pembelian = Pembelian::whereDate('created_at', $tanggal_loop)->sum('bayar');
            $total_pengeluaran = Pengeluaran::whereDate('created_at', $tanggal_loop)->sum('nominal');

            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;

            $data_pendapatan[] = $pendapatan;

            $tanggal_loop = date('Y-m-d', strtotime('+1 day', strtotime($tanggal_loop)));
        }

        if (Auth::user()->level == 1) {
            return view('admin.dashboard', compact(
                'kategori',
                'produk',
                'supplier',
                'member',
                'tanggal_awal',
                'tanggal_akhir',
                'data_tanggal',
                'data_pendapatan'
            ));
        }

        return view('kasir.dashboard');
    }
}