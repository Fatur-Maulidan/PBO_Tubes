<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Transaksi;


class TransaksiController extends Controller
{
    public function index(Request $request){
      $transaksi = Transaksi::whereNotNull('tanggalPengembalian')->get();
      if ($request->ajax()) {
        return DataTables::of($transaksi)
          ->addIndexColumn()
          ->make(true);
    }
      return view('transaksi.index');
    }
}