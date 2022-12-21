<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Mahasiswa;
use App\Models\Buku;
use Illuminate\Support\Facades\Log;
use Exception;

class ReturnController extends Controller   
{
    public function index(){
        return view('return.index');
    }

    public function getDataPeminjam($transaksi){
        return view('return.return', ['transaksi' => $transaksi]);
    }

    public function checkValidate(Request $request){
        $mahasiswa = mahasiswa::where('id', $request->nim)->first();
        $transaksi = Transaksi::where('namaPeminjam',$mahasiswa->Nama)->whereNull('tanggalPengembalian')->get();
        return $this->getDataTransaksi($transaksi, $mahasiswa);
    }

    public function pengembalian($transaksi){
        $transaksi = Transaksi::where('id', $transaksi)->first();
        $buku = Buku::where('namaBuku', '=' ,$transaksi->namaBuku)->first();
        $this->updateBuku($buku,$transaksi);
        $this->updateTransaksi($transaksi);
        return redirect()->route('getIndexPengembalian')
                ->with('success_message', 'Berhasil Mengembalikan Buku');
    }

    public function getDataTransaksi($transaksi, $mahasiswa){
        try {
            if($transaksi == null){
                return redirect()->route('getIndexPengembalian')
                    ->with('error_message', 'Mahasiswa '.$mahasiswa->nama.' Belum pernah meminjam');
            } else {
                return $this->getDataPeminjam($transaksi);
            }
        } catch(Exception $e){
            Log::error($e->getMessage(), 'Error ketika mengambil data transaksi');
        }
    }

    public function updateTransaksi($transaksi){
        try{
            $transaksi->tanggalPeminjaman = $transaksi->created_at;
            $transaksi->tanggalPengembalian = now();
            $transaksi->save();
        } catch (Exception $e){
            Log::error($e->getMessage(), 'Error ketika Update Transaksi');
        }
    }

    public function updateBuku($buku, $transaksi){
        try{
            $buku->jumlahBuku = $buku->jumlahBuku + $transaksi->jumlahBuku;
            $buku->save();
        } catch (Exception $e) {
            Log::error($e->getMessage(), 'Error ketika Update Buku');
        }
    }
}