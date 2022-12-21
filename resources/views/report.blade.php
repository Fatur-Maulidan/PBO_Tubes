<style>
    table.blueTable {
        border: 1px solid #1C6EA4;
        background-color: #EEEEEE;
        width: 100%;
        text-align: left;
        border-collapse: collapse;
    }

    table.blueTable td,
    table.blueTable th {
        border: 1px solid #AAAAAA;
        padding: 3px 2px;
    }

    table.blueTable tbody td {
        font-size: 13px;
    }

    table.blueTable tr:nth-child(even) {
        background: #D0E4F5;
    }

    table.blueTable thead {
        background: #1C6EA4;
        background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        border-bottom: 2px solid #444444;
    }

    table.blueTable thead th {
        font-size: 15px;
        font-weight: bold;
        color: black;
        border-left: 2px solid #D0E4F5;
    }

    table.blueTable thead th:first-child {
        border-left: none;
    }
</style>

<table class="blueTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Nama Buku</th>
            <th>Jumlah Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $key => $transaksi)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$transaksi->namaPeminjam}}</td>
            <td>{{$transaksi->namaBuku}}</td>
            <td>{{$transaksi->jumlahBuku}}</td>
            <td>{{$transaksi->tanggalPeminjaman}}</td>
            <td>{{$transaksi->tanggalPengembalian}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
