<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - UniClub</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            color: #222;
            margin: 0
        }

        header {
            background: #111;
            color: #fff;
            padding: 18px 6%
        }

        header a {
            color: #fff;
            text-decoration: none
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 35px auto;
            background: #fff;
            padding: 25px
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px
        }

        th,
        td {
            padding: 13px;
            border-bottom: 1px solid #ddd;
            text-align: left
        }

        img {
            width: 65px;
            height: 65px;
            object-fit: cover
        }

        .btn {
            display: inline-block;
            background: #111;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border: 0;
            cursor: pointer
        }

        .remove {
            background: #b42318;
            color: white;
            padding: 8px 11px;
            border: 0;
            cursor: pointer
        }

        .total {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin: 25px 0
        }

        .alert {
            background: #e4f5e8;
            padding: 12px;
            margin: 15px 0
        }

        @media(max-width:650px) {
            .container {
                width: auto;
                margin: 15px;
                padding: 12px
            }

            th,
            td {
                padding: 8px;
                font-size: 13px
            }
        }
    </style>
</head>

<body>
    <header><strong>UNICLUB</strong> &nbsp; <a href="{{ route('barang.index') }}">Lanjut Belanja</a></header>
    <main class="container">
        <h1>Keranjang Belanja</h1>
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if ($barangs->isEmpty())
            <p>Keranjang masih kosong.</p>
            <a class="btn" href="{{ route('barang.index') }}">Lihat Barang</a>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>
                                @if ($barang->foto)
                                    <img src="{{ asset('foto-barang/' . $barang->foto) }}" alt="{{ $barang->nama }}">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $barang->nama }}</td>
                            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                            <td>{{ $barang->jumlah_beli }}</td>
                            <td>Rp {{ number_format($barang->harga * $barang->jumlah_beli, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('keranjang.hapus', $barang->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="remove" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total">Total: Rp {{ number_format($total, 0, ',', '.') }}</div>
            <a class="btn" href="{{ route('barang.index') }}">Lanjut Belanja</a>
        @endif
    </main>
</body>

</html>
