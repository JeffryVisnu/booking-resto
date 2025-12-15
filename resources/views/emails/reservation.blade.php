<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail Reservasi</title>
</head>
<body style="font-family: Arial, sans-serif;">

<h2>Detail Reservasi Gusteau Restaurant</h2>

<p><strong>Nama:</strong>
    {{ $reservation->first_name }} {{ $reservation->last_name }}
</p>

<p><strong>Email:</strong> {{ $reservation->email }}</p>
<p><strong>No. Telp:</strong> {{ $reservation->tel_number }}</p>
<p><strong>Tanggal Reservasi:</strong>
    {{ \Carbon\Carbon::parse($reservation->res_date)->format('d M Y H:i') }}
</p>

<p><strong>Jumlah Tamu:</strong> {{ $reservation->guest_number }}</p>

<hr>

@if(!empty($reservation->order_items))
    <h3>Menu Dipesan</h3>

    @if(!empty($reservation->order_items['foods']))
        <strong>Makanan</strong>
        <ul>
            @foreach($reservation->order_items['foods'] as $item)
                <li>{{ $item['qty'] }} x Menu ID {{ $item['menu_id'] }}</li>
            @endforeach
        </ul>
    @endif

    @if(!empty($reservation->order_items['drinks']))
        <strong>Minuman</strong>
        <ul>
            @foreach($reservation->order_items['drinks'] as $item)
                <li>{{ $item['qty'] }} x Menu ID {{ $item['menu_id'] }}</li>
            @endforeach
        </ul>
    @endif
@endif

<hr>

<p>Terima kasih telah melakukan reservasi di <strong>Gusteau Restaurant</strong>.</p>

</body>
</html>
