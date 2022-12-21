<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Exception;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $buku = Buku::select('*');
            return DataTables::of($buku)
                ->addIndexColumn()
                ->addColumn('action', function ($row){
                    $btn = '<a href= "' . route('books.edit', $row->id) . '" class="btn btn-primary btn-xs">Edit</a>';
                    $btn = $btn . ' <a href="'
                                . route('books.destroy', $row->id)
                                . '"class="btn btn-danger btn-xs" onclick="notificationBeforeDelete(event, this)">Hapus</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('books.indexbooks');
    }

    public function create()
    {
        return view('books.insertbooks');
    }

    public function store(Request $request){
        try{
            $buku = new Buku();
            $buku->namaBuku = $request->input('namaBuku');
            $buku->author = $request->input('author');
            $buku->genreBuku = $request->input('genreBuku');
            $buku->jumlahBuku = $request->input('jumlahBuku');
            if($request->input('jumlahBuku') <= 0){
                Log::error('Error karena inputan tidak sesuai');
                return redirect()->route('books.create', [
                    'buku' => $buku
                ])
                    ->with('error_message','Error karena inputan tidak sesuai');
            }
            $buku->save();
            return redirect()->route('books.index')
            ->with('success_message','Buku Ditambahkan.');
        } catch (Exception $e){
            
            return redirect()->route('books.index')
            ->with('error_message','Error ketika menambahkan Buku');
        }
    }

    public function edit($id)
    {
        try {
            $buku = Buku::find($id);
            if (!$buku) return redirect()->route('books.index')
                ->with('error_message', 'User dengan id '.$id.' tidak ditemukan');
            return view('books.updatebooks', [
                'buku' => $buku
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage(),'Error ketika mencari buku dengan id tersebut');
        }
    }


    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->namaBuku = $request->input('namaBuku');
        $buku->author = $request->input('author');
        $buku->genreBuku = $request->input('genreBuku');
        $buku->save();
        return redirect()->route('books.index')
            ->with('success_message', 'Berhasil mengubah Buku');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        if ($buku) $buku->delete();
        return redirect()->route('books.index')
            ->with('success_message', 'Berhasil menghapus buku');
    }
}