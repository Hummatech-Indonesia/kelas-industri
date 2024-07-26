@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PDF Example</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            background: url('{{ public_path('Background1.png') }}') no-repeat center center;
            /* background-image: url('/Background1.png'); */
            background-size: cover;
            width: 100%;
            height: 100vh;
            /* overflow: hidden; */
        }

        .content {
            color: white;
        }

        .item1 {
            float: left;
            margin-top: 7.1rem;
            margin-left: 2.7rem;
        }

        .item2 {
            float: left;
            margin-top: 7.1rem;
            margin-left: 2.7rem;
            font-weight: bold;
        }

        .item3 {
            margin: 0;
            margin-top: 0.6rem;
            margin-left: 2.7rem;
            color: white;
        }

        .date-start {
            float: left;
            margin: 0;
            margin-top: 1.7rem;
            margin-left: 2.7rem;
            color: white;
        }

        .date-end {
            float: left;
            margin: 0;
            margin-top: 1.7rem;
            margin-left: 6.5rem;
            color: white;
        }

        .text-to {
            color: black;
            margin: 0;
            margin-top: 4.1rem;
            font-weight: 500;
            margin-left: 4.3rem
        }

        .school {
            color: black;
            font-weight: 550;
            margin: 0;
            margin-top: 0.7rem;
            margin-left: 4.3rem;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .table-description {
            margin-top: 1.7rem;
            margin-left: 5.8rem;
        }

        .table-history {
            margin-top: 5.4rem;
            margin-left: 5.8rem;
        }

        table {
            border-collapse: collapse;
            width: 85%;
            /* Sesuaikan lebar tabel sesuai kebutuhan */
        }

        th,
        td {
            border: 1px solid #0090E8;
            padding: 5px;
            /* Sesuaikan padding sesuai kebutuhan */
            text-align: right;
        }

        th {
            background-color: #0171BF;
            color: white;
        }

        /* Tambahkan untuk warna latar belakang baris ganjil */
        tr:nth-child(odd) {
            background-color: #fff;
            /* Warna putih */
        }

        /* Untuk tampilan responsif */
        @media screen and (max-width: 600px) {
            table {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="content clearfix">
        <p class="item1">{{ $payment->reference }}</p>
        <p class="item2">{{ $payment->via }}</p>
    </div>
    <p class="item3">{{ $payment->invoice_id }}</p>
    <div class="content clearfix">
        <p class="date-start">{{ Carbon::parse($payment->created_at)->locale('id')->isoFormat('D MMMM YYYY, H:m') }}</p>
        <p class="date-end">{{ Carbon::parse($payment->updated_at)->locale('id')->isoFormat('D MMMM YYYY, H:m') }}</p>
    </div>
    <div class="">
        <p class="text-to">{{ $payment->user->name }}</p>
        <p class="school">{{ $payment->user->studentSchool->school->name }}</p>
    </div>
    <div class="table-description">
        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pembayaran Kelas Industri Semester {{ $payment->semester }}</td>
                    <td>Rp. {{ number_format($dependent->nominal), 0, ',', '.' }},-</td>
                </tr>
                <tr>
                    <td style="background-color: #008fe845;">Subtotal</td>
                    <td style="background-color: #008fe845;">Rp.
                        {{ number_format($payment->total_pay), 0, ',', '.' }},-</td>
                </tr>
                <tr>
                    <td style="background-color: #008fe845;">Biaya Admin</td>
                    <td style="background-color: #008fe845;">Rp.
                        {{ number_format($payment->fee_amount), 0, ',', '.' }},-</td>
                </tr>
                <tr>
                    <td style="background-color: #0171BF;color:white"><strong>Total</strong></td>
                    <td style="background-color:#0171BF;color:white;"><strong>Rp.
                            {{ number_format($payment->paid_amount), 0, ',', '.' }},-</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-history">
        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pembayaran Kelas Industri Semester {{ $payment->semester }}</td>
                    <td>Rp. {{ number_format($dependent->nominal), 0, ',', '.' }},-</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left;background-color: #008fe845;">Sudah Dibayar</td>
                </tr>
                @foreach ($paymentHistories as $index => $paymentHistory)
                    <tr>
                        <td style="text-align: left"><span>Pembayaran Ke-{{ $index + 1 }}</span><span
                                style="margin-left: 3rem">{{ Carbon::parse($paymentHistory->created_at)->locale('id')->isoFormat('D MMMM YYYY, H:m') }}</span>
                        </td>
                        <td>Rp. {{ number_format($paymentHistory->total_pay), 0, ',', '.' }},-</td>
                    </tr>
                @endforeach
                <tr>
                    <td style="background-color: #0171BF;color:white;"><strong>Kekurangan Pembayaran</strong></td>
                    <td style="background-color:#0171BF;color:white;"><strong>Rp.
                            {{ number_format($dependent->nominal - $amountPaymentHistories), 0, ',', '.' }},-</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @if ($dependent->nominal - $amountPaymentHistories > 0)
        <div style="margin-top: 6rem; float:right; margin-right:6.3rem;">
            <img src="{{ public_path('StempelLunas.png') }}" width="200" alt="Stempel Lunas"
                style="transform: rotate(-15deg);" alt="" srcset="">
        </div>
    @endif
</body>

</html>
