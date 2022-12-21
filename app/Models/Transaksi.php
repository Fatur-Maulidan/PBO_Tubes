<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class transaksi extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'transaksi';

    protected $table = 'transaksi';
    protected $fillable = [
        'namaPeminjam',
        'namaBuku',
        'jumlahBuku',
        'tanggalPeminjaman',
        'tanggalPengembalian',
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . "{$eventName} by " . Auth::user()->name;
    }
}