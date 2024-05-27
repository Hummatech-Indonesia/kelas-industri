<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Kelas Industri</title>
    <link rel="icon" href="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}" type="image/png" />
    <link rel="shortcut icon" href="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .text-right {
            text-align: right;
        }

        hr {
            display: block;
            margin-top: 30px;
            margin-bottom: 40px;
            border: none;
            border-top: 1px solid #ccc;
        }

        .content-title {
            padding-top: 20px;
            font-weight: bold;
        }

        .value {
            font-weight: bold;
            padding-top: 10px;
            font-size: 1.2rem;
        }

        .invoice-container {
            background-color: #fff;
            padding: 20px;
            max-width: 800px;
        }

        .header .title {
            text-align: left;
            padding-left: 10px;
        }

        .title span {
            font-size: 1.5rem;
        }

        .header img {
            max-width: 100px;
        }

        .transaction-code {
            color: #007bff;
        }

        .content {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <table cellspacing="0" cellpadding="0" style="width: 100%;">
            <thead>
                <tr class="header">
                    <th style="width: 100px;">
                        <img src="{{ public_path('app-assets/logo_file/Logo-Kelas-Industri.png') }}"
                            alt="Logo Kelas Industri" style="width: 100%;">
                    </th>
                    <th class="title"><span style="display: inline;">Kelas Industri<br>Hummatech</span></th>
                    <th style="text-align: right;"><span>Kode Transaksi</span><br><span
                            class="transaction-code">{{ $reference }}</span></th>
                </tr>
            </thead>
            <tbody class="content">
                <tr>
                    <td class="content-title" style="font-weight: normal;" colspan="2">Total Pembayaran</td>
                    <td class="content-title text-right" style="font-weight: normal;">Metode Pembayaran</td>
                </tr>
                <tr>
                    <td class="value" colspan="2">Rp. {{ $payment_total }}</td>
                    <td class="value text-right">{{ $via }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table cellspacing="0" cellpadding="0" style="width: 100%;">
            <tbody class="content">
                <tr>
                    <td class="content-title" colspan="2" style="font-weight: normal;">Tagihan Dibuat</td>
                    <td class="content-title text-right" style="font-weight: normal;">Tagihan Dibayar</td>
                </tr>
                <tr>
                    <td class="value" colspan="2">{{ $created_at }}</td>
                    <td class="value text-right">{{ $updated_at }}</td>
                </tr>
                <tr>
                    <td style="padding-top: 20px;">Rincian Pesanan</td>
                </tr>
                <tr>
                    <td style="padding-top: 10px; font-weight: bold;" colspan="2">Paket Siswa</td>
                    <td class="text-right" style="font-weight: bold;" rowspan="2">Rp. {{ $dependet }}</td>
                </tr>
                <tr>
                    <td colspan="2">(Semester {{ $semester }})</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table cellspacing="0" cellpadding="0" style="width: 100%;">
            <tbody class="content">
                <tr>
                    <td class="content-title" style="font-weight: bold;" colspan="2">Subtotal Tagihan</td>
                    <td class="content-title text-right" style="font-weight: bold;">Rp. {{ $dependetp }}</td>
                </tr>
                <tr>
                    <td class="content-title" style="font-weight: bold;" colspan="2">Biaya Layanan</td>
                    <td class="content-title text-right" style="font-weight: bold;">Rp. {{ $fee_amount }}</td>
                </tr>
                <tr>
                    <td class="value" colspan="2">Total Pembayaran</td>
                    <td class="value text-right">Rp. {{ $total }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
    </div>
</body>

</html>
