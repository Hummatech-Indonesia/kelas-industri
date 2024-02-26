<!DOCTYPE html>
<html>

<head>
    <title>Absen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    @if ($status === 'success')
        <div class="md:w-1/2 lg:w-1/3 w-full bg-white p-8 shadow-lg rounded-lg border border-blue-600">
            <img src="{{ asset('app-assets/media/illustrations/Confirmed attendance-rafiki.png') }}" alt=""
                srcset="">
            <h1 class="text-4xl text-center font-bold mb-4 text-blue-600">Berhasil</h1>
            <p class="text-lg text-center text-blue-400">Berhasil Melakukan Absen</p>
        </div>
    @elseif ($status === 'closed')
        <div class="md:w-1/2 lg:w-1/3 w-full bg-white p-8 shadow-lg rounded-lg border border-red-600">
            <img src="{{ asset('app-assets/media/illustrations/Time management-rafiki.png') }}" alt=""
                srcset="">
            <h1 class="text-4xl font-bold mb-4 text-red-600">Gagal!</h1>
            <p class="text-lg text-red-400">Absen Sudah Kadaluarsa!</p>
        </div>
    @elseif ($status === 'have_done')
        <div class="md:w-1/2 lg:w-1/3 w-full bg-white p-8 shadow-lg rounded-lg border border-yellow-600">
            <img src="{{ asset('app-assets/media/illustrations/Done-rafiki.png') }}" alt="" srcset="">
            <h1 class="text-4xl text-center font-bold mb-4 text-yellow-600">Gagal!</h1>
            <p class="text-lg text-center text-yellow-600">Kamu Sudah Absen!</p>
        </div>
    @else
        <h1>Status: Unknown</h1>
        <p>Status tidak dikenali.</p>
    @endif
</body>

</html>
