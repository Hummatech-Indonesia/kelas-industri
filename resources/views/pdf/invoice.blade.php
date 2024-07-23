<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Kelas Industri</title>
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
            margin: auto;
            border: 1px solid #ccc;
        }

        .header {
            display: flex;
            justify-content: space-between
        }

        .header img {
            width: 100px;
        }

        .header .company-details {
            /* margin-left: 20px; */
            width: 40%;
        }

        .header .company-details h2 {
            margin: 0;
            font-size: 24px;
            color: #007bff;
        }

        .header .company-details p {
            margin: 2px 0;
            font-size: 12px;
        }

        .header .company-details p span {
            display: block;
        }

        .transaction-details {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .transaction-details .left p {
            padding-left: 5px;
        }
        .transaction-details .left p:nth-child(1) {
            margin-top: 3rem;
        }

        .transaction-details .left,
        .transaction-details .right {
            width: 45%;
        }

        .transaction-details .right {
            text-align: left;
            width: fit-content;
        }

        .transaction-details .right p:nth-child(1) {
            margin-bottom: 2rem;
        }

        .transaction-details h1 {
            /* margin: 0; */
            font-size: 3rem;
        }

        .transaction-details p {
            margin: 2px 0;
        }

        .content-title {
            font-weight: bold;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #7ab1ec;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #0166d1;
            color: white;
            text-align: center;
        }

        .bg-blue {
            color: white;
            background-color: #0166d1;
        }

        .bg-liht-blue {
            /* border: 1px solid #0166d1; */
            background-color: #accdf0;
        }

        .table .right {
            text-align: right;
        }

        .paid-stamp {
            display: block;
            text-align: center;
            color: red;
            position: relative;
            transform: rotate(-20deg);
            width: 250px;
            margin: 4rem auto;
        }

        .stamp {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .director-signature {
            width: 35%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .director-signature .stamp {
            width: 100px;
        }

        .director-signature .name {
            font-weight: bold;
        }

        .director-signature .position {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="header">
            <img src="{{ asset('app-assets/logo_file/hummatech.png') }}" alt="Logo Kelas Industri">
            <div class="company-details">
                <p><span>PT Humma Teknologi Indonesia</span>
                    <span>Perumahan Permata Regency I Blok 10 No 28, Kel. Ngijo, Kec. Karangploso, Kab. Malang,
                        65152</span>
                    <span>0851 7677 7785</span>
                    <span>info@hummatech.com</span>
                </p>
            </div>
        </div>

        <div class="transaction-details">
            <div class="left">
                <h1>Kwitansi</h1>
                <table>
                    <tr>
                        <td>Nomor</td>
                        <td>: KI-HMTI-2024-001</td>
                    </tr>
                    <tr>
                        <td>Tagihan Dibuat</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td>Tagihan Dibayar</td>
                        <td>: </td>
                    </tr>
                </table>

                <p style="margin-top: 20px">Kepada:</p>
                <p>Nama</p>
                <p>SMK</p>
            </div>
            <div class="right">
                <p><strong>Kode Transaksi: <br></strong> <strong>DEV-T23746166541KMABP</strong></p>
                <p><strong>Metode Pembayaran: <br></strong> <strong>BNI VIRTUAL ACCOUNT</strong></p>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pembayaran Kelas Industri Kelas X Semester Ganjil 2024/2025</td>
                    <td class="right">Rp. 150.000,-</td>
                </tr>
                <tr class="bg-liht-blue">
                    <td class="right "><strong>Subtotal</strong></td>
                    <td class="right">Rp. 150.000,-</td>
                </tr>
                <tr class="bg-liht-blue">
                    <td class="right "><strong>Biaya Admin</strong></td>
                    <td class="right">Rp. 4.250,-</td>
                </tr>
                <tr class="bg-blue">
                    <td class="right"><strong>Total</strong></td>
                    <td class="right"><strong>Rp. 154.250,-</strong></td>
                </tr>
            </tbody>
        </table>


        <h4 style="margin: 30px 0 0 0;">Riwayat Pembayaran</h4>
        <table class="table" style="margin-top: 0;">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Biaya Kelas Industri Kelas X Semester Ganjil 2024/2025</td>
                    <td class="right">Rp. 390.000,-</td>
                </tr>
                <tr class="bg-liht-blue">
                    <td>Sudah Dibayar</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Pembayaran ke-1 (11 Juli 2024)</td>
                    <td class="right">Rp. 150.000,-</td>
                </tr>
                <tr>
                    <td>Pembayaran ke-2 (19 Juli 2024)</td>
                    <td class="right">Rp. 100.000,-</td>
                </tr>
                <tr>
                    <td>Pembayaran ke-n (22 Juli 2024)</td>
                    <td class="right">Rp. 50.000,-</td>
                </tr>
                <tr class="bg-blue">
                    <td class="right"><strong>Kekurangan Pembayaran</strong></td>
                    <td class="right">Rp. 90.000,-</td>
                </tr>
            </tbody>
        </table>

        <div class="stamp">
            {{-- <div class="paid-stamp"></div>
             --}}
             <img class="paid-stamp" src="{{ asset('stamp/stempel lunas.svg') }}" alt="">
            <div class="director-signature">
                <div>
                    <p class="name">Afrizal Himawan, S.Kom</p>
                    <img class="stamp" src="{{ asset('app-assets/logo_file/stamp.png') }}" alt="Ttd stempel">
                    <p class="position">Direktur PT Humma Teknologi Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
