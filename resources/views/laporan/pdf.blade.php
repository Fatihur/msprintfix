<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Laporan Penjualan</h1>
    @foreach ($penjualan as $pj)
        <h2>Tanggal: {{ $pj->tanggal }}</h2>
        <h3>Konsumen: {{ $pj->konsumen }}</h3>
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pj->penjualandetails as $detail)

                    <tr>
                        <td>{{ $detail->produk->judul }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>Rp{{ number_format($detail->total, 3, '', '.') }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    @endforeach
</body>
</html>
