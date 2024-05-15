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

        .invoice-container {
            background-color: #fff;
            padding: 20px;
            max-width: 800px;

        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }

        .header img {
            max-width: 100px;
        }

        .header .transaction-code {
            color: #007bff;
        }

        .content {
            margin-top: 20px;
        }

        .content .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .content .row div {
            flex: 1;
        }

        .content .row div:first-child {
            margin-right: 10px;
        }

        .content .row div:last-child {
            margin-left: 10px;
        }

        .content .total {
            font-weight: bold;
            font-size: 1.2em;
        }

        .content .total-amount {
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="header">
            <div style="display: flex; align-items: center;">
                <img src="{{ public_path('app-assets/logo_file/Logo-Kelas-Industri.png') }}" alt="Logo Kelas Industri"
                    style="margin-right: 10px;">
                <h2 style="margin: 0;">Kelas Industri Hummatech</h2>
            </div>
            <div style="text-align: right;">
                <p style="margin: 0;">Kode Transaksi</p>
                <p class="transaction-code" style="margin: 0;">Azsexdcfghbjnkm265498</p>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div>
                    <p>Total Pembayaran</p>
                    <p class="total-amount">Rp 000.000,00</p>
                </div>
                <div>
                    <p>Metode Pembayaran</p>
                    <p>Bank Hummatech</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div>
                    <p>Tagihan Dibuat</p>
                    <p>10 Desember 2024, 03:00</p>
                </div>
                <div>
                    <p>Tagihan Dibayar</p>
                    <p>11 Desember 2024, 04:00</p>
                </div>
            </div>
            <div class="row">
                <div>
                    <p>Rincian Pesanan</p>
                    <p>Paket Siswa</p>
                    <p>(Semester Genap)</p>
                </div>
                <div>
                    <p>Rp000.000,00</p>
                </div>
            </div>
            <hr>
            <div class="row total">
                <div>
                    <p>Subtotal Tagihan</p>
                </div>
                <div>
                    <p>Rp000.000,00</p>
                </div>
            </div>
            <div class="row total">
                <div>
                    <p>Total Pembayaran</p>
                </div>
                <div>
                    <p class="total-amount">Rp000.000,00</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
