<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan - Zanshop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>Laporan Transaksi Toko {{ $store->name }}</h1>
    <p>Tanggal :
        @if ($date_from == null)
            Semua
        @else
            {{ dateFormat($date_to) }} - {{ dateFormat($date_from) }}
        @endif
    </p>
    <p>Status :
        @if ($status == 1)
            Dalam Pengemasan Toko
        @elseif ($status == 2)
            Dalam Pengirim Toko
        @elseif ($status == 3)
            Selesai
        @elseif ($status == 4)
            Gagal
        @else
            Semua
        @endif
    </p>
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua.</p> --}}

    <table class="table table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">No Order</th>
            <th class="text-center">Tanggal Order</th>
            <th class="text-center">Total</th>
            <th class="text-center">Status</th>
        </tr>
        @php
            $i = 1;
        @endphp
        @forelse ($orders as $key=> $order)
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                <td class="text-center">{{ $order->no_order }}</td>
                <td class="text-center">{{ $order->created_at->format('d/m/Y') }}</td>
                <td class="text-end">Rp {{ number_format($order->total, 2) }}</td>
                <td class="text-center">
                    @if ($order->status == 1)
                        Dalam Pengemasan Toko
                    @elseif ($order->status == 2)
                        Dalam Pengirim Toko
                    @elseif ($order->status == 3)
                        Selesai
                    @else
                        Gagal
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <td class="text-center" colspan="4"><strong>Total</strong></td>
            <td class="text-center"><strong>Rp {{ number_format($orders->sum('total'), 2) }}</strong></td>
        </tr>
    </table>

</body>

</html>
